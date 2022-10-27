<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentDigest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\commentResourceWithProduct;
use App\Http\Resources\CommentUserResource;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{

    private static $PER_PAGE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        
        $confirmed = $request->query('confirmed', null);
        $rate = $request->query('rate', null);
        $max = $request->query('max', null);
        $min = $request->query('min', null);

        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);

        $fromCreatedAt = $request->query('fromCreatedAt', null);
        $toCreatedAt = $request->query('toCreatedAt', null);

        $comments = [];

        if($confirmed == null)
            $comments = $product->comments();
        else if($confirmed)
            $comments = $product->comments()->confirmed();
        else
            $comments = $product->comments()->unConfirmed();

        if($rate != null && $rate)
            $comments = $comments->whereNotNull('rate');
        else if($rate != null && !$rate)
            $comments = $comments->whereNull('rate');

        if($max != null)
            $comments = $comments->where('rate', '<=', $max);

        if($min != null)
            $comments = $comments->where('rate', '>=', $min);


        if($fromCreatedAt != null)
            $comments =  $comments->whereDate('created_at', '>=', self::ShamsiToMilady($fromCreatedAt));
            
        if($toCreatedAt != null)
            $comments = $comments->whereDate('created_at', '<=', self::ShamsiToMilady($toCreatedAt));

        if($orderBy != null && 
            ($orderBy == 'created_at' || $orderBy == 'rate' || $orderBy == 'confirmed_at')
        ) {
            $orderByType = $orderByType == null || $orderByType == 'desc' || $orderByType != 'asc' ? 'desc' : 'asc';
            $comments->orderBy($orderBy, $orderByType);
        }

        $tmp = $comments->paginate(20);

        return view('admin.product.comments.list', [
            'items' => CommentDigest::collection($tmp)->toArray($request),
            'confirmedFilter' => $confirmed,
            'rateFilter' => $rate,
            'maxFilter' => $max,
            'minFilter' => $min,
            'orderByType' => $orderByType,
            'orderBy' => $orderBy,
            'total_count' => $tmp->count(),
            'productId' => $product->id,
            'productName' => $product->name,
            'fromCreatedAtFilter' => $fromCreatedAt,
            'toCreatedAtFilter' => $toCreatedAt,
        ]);
    }



    public function getMyComments(Request $request) {
        $comments = commentResourceWithProduct::collection
        (
            Comment::where('user_id', $request->user()->id)->whereNotNull('msg')->get()
        )->toArray($request);

        return response()->json([
            'status' => 'ok',
            'data' => $comments
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Product $product, Request $request)
    {
        $page = $request->query('page', 1);

        $comments = $product->comments()->confirmed();

        $orderBy = $request->query('orderBy', null);
        $orderBy = $orderBy != null && $orderBy == 'rate' ? 'rate' : 'created_at';

        $orderByType = $request->query('orderType', null);
        $orderByType = $orderByType != null && $orderByType === 'asc' ? 'asc' : 'desc';
        // dd($comments->orderBy($orderBy, $orderByType)->get());
        
        return response()->json([
            'status' => 'ok',
            'data' => CommentUserResource::collection(
                $comments->orderBy($orderBy, $orderByType)
                ->skip(($page - 1) * self::$PER_PAGE)->take(self::$PER_PAGE)
                ->get())
                ->toArray($request)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        if(!$product->visibility)
            abort(401);

        $validator = [
            'msg' => 'required_without_all:is_bookmark,rate|string|min:2',
            'rate' => 'required_without_all:msg,is_bookmark|integer|min:1|max:5',
            'is_bookmark' => 'required_without_all:msg,rate|boolean',
            'negative' => 'nullable|array|min:1',
            'positive' => 'nullable|array|min:1',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $user = $request->user();
        $request->validate($validator);
        $comment = Comment::userComment($product->id, $user->id);
        $needUpdateProductTable = false;
        $needToConfirm = false;

        if($comment == null) {
            $comment = new Comment();
            $comment->product_id = $product->id;
            $comment->user_id = $user->id;
            $comment->status = false;
            $needToConfirm = true;

            if($request->has('rate')) {
                $product->rate = round(($product->rate * $product->rate_count + $request['rate']) / ($product->rate_count + 1), 2);
                $product->rate_count = $product->rate_count + 1;
                $needUpdateProductTable = true;
            }
            if($request->has('msg')) {
                $product->comment_count = $product->comment_count + 1;
                $needUpdateProductTable = true;
            }
        }

        if($request->has('msg')) {

            $comment->msg = $request['msg'];

            if($request->has('negative'))
                $comment->negative = implode('$$$___$$$', $request['negative']);

            if($request->has('positive'))
                $comment->positive = implode('$$$___$$$', $request['positive']);

            if($comment->status) {
                $needToConfirm = true;
                $needUpdateProductTable = true;
            }

            $comment->status = false;
        }

        if($request->has('rate')) {
            if(!$needUpdateProductTable) {
                $product->rate = round(($product->rate * $product->rate_count - $comment->rate + $request['rate']) / $product->rate_count, 2);
                $needUpdateProductTable = true;
            }
            
            $comment->rate = $request['rate'];
        }

        if($request->has('is_bookmark'))
            $comment->is_bookmark = $request['is_bookmark'];
        
        $comment->save();

        if($needUpdateProductTable) {
            
            if($needToConfirm)
                $product->new_comment_count = $product->new_comment_count + 1;

            $product->save();
        }
            
        return response()->json(['status' => 'ok']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment, Request $request)
    {
        return view('admin.product.comments.edit', [
            'item' => CommentResource::make($comment)->toArray($request),
            'product_id' => $comment->product->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($request->has('rate') && $request['rate'] == 0)
            unset($request['rate']);

        $user = $request->user();
        $validator = [
            'msg' => 'required_without_all:rate|string|min:2',
            'rate' => 'required_without_all:msg|integer|min:0|max:5',
            'negative' => 'nullable|array|min:1',
            'positive' => 'nullable|array|min:1',
            'status' => Rule::requiredIf($user->level === User::$ADMIN_LEVEL || $user->level === User::$EDITOR_LEVEL),
        ];
     
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        
        if($user->level != User::$ADMIN_LEVEL && 
            $user->level != User::$EDITOR_LEVEL && 
            $user->id != $comment->user_id
        )
            abort(401);

        $isAdmin = $user->level == User::$ADMIN_LEVEL ||
            $user->level == User::$EDITOR_LEVEL;

        if(!$isAdmin && $request->has('status'))
            abort(401);

        $product = $comment->product;
        $needUpdateProductTable = false;

        if(!$isAdmin && $comment->status) {
            $comment->status = false;
            $product->new_comment_count += 1;
            $needUpdateProductTable = true;
        }

        if($isAdmin && $request['status'] != $comment->status) {

            if($request['status']) {
                $product->new_comment_count -= 1;
                $comment->confirmed_at = Carbon::now();
            }
            else
                $product->new_comment_count += 1;
                
            $needUpdateProductTable = true;
        }


        if($request->has('rate') && $request['rate'] != null && $request['rate'] != $comment->rate) {
            $product->rate = round(($product->rate * $product->rate_count - $comment->rate + $request['rate']) / ($product->rate_count * 1.0), 2);
            $needUpdateProductTable = true;
        }
        else if(
            (!$request->has('rate') || $request['rate'] == null) && $comment->rate != null
        ) {
            $comment->rate = null;
            $product->rate = round(($product->rate * $product->rate_count - $comment->rate) / (($product->rate_count - 1) * 1.0), 2);
            $product->rate_count -= 1;
            $needUpdateProductTable = true;
        }

        if($needUpdateProductTable)
            $product->save();

        foreach($request->keys() as $key) {

            if($key == '_token')
                continue;
            
            if($key == 'positive')
                $comment[$key] = implode('$$$___$$$', $request['positive']);
            else if($key === 'negative')
                $comment[$key] = implode('$$$___$$$', $request['negative']);
            else
                $comment[$key] = $request[$key];
        }

        $comment->save();
        return Redirect::route('product.comment.index', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $product = $comment->product;

        if(!$comment->status)
            $product->new_comment_count -= 1;
        
        if($comment->rate != null) {
            $product->rate = round(($product->rate * $product->rate_count - $comment->rate) / (($product->rate_count - 1) * 1.0), 2);
            $product->rate_count -= 1;
        }

        $product->comment_count -= 1;
        $product->save();
        $comment->delete();

        return response()->json(['status' => 'ok']);
    }
}
