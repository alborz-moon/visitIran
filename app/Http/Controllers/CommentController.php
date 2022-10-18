<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentDigest;
use App\Http\Resources\CommentResource;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        
        $confirmed = $request->query('confirmed', null);
        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);

        $comments = [];

        if($confirmed == null)
            $comments = $product->comments();
        else if($confirmed)
            $comments = $product->comments()->confirmed();
        else
            $comments = $product->comments()->unConfirmed();

        if($orderBy != null && 
            ($orderBy == 'created_at' || $orderBy == 'rate')
        ) {
            $orderByType = $orderByType == null || $orderByType == 'desc' || $orderByType != 'asc' ? 'desc' : 'asc';
            $comments->orderBy($orderBy, $orderByType);
        }
        
        $tmp = $comments->paginate(20);

        return view('admin.product.comments.list', [
            'items' => CommentDigest::collection($tmp)->toArray($request),
            'total_count' => $tmp->count(),
            'productId' => $product->id,
            'productName' => $product->name
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Product $product, Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => CommentUserResource::collection($product->comments()->confirmed()->get())->toArray($request)
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
            'title' => 'required_without_all:is_bookmark,rate|string|min:2',
            'rate' => 'required_without_all:title,is_bookmark|integer|min:1|max:5',
            'is_bookmark' => 'required_without_all:title,rate|boolean',
            'negative' => 'nullable|array|min:1',
            'positive' => 'nullable|array|min:1',
            'msg' => 'nullable:rate,is_bookmark|string',
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
                $product->rate = ($product->rate * $product->rate_count + $request['rate']) / ($product->rate_count + 1);
                $product->rate_count = $product->rate_count + 1;
                $needUpdateProductTable = true;
            }
            if($request->has('title')) {
                $product->comment_count = $product->comment_count + 1;
                $needUpdateProductTable = true;
            }
        }

        if($request->has('title')) {
            
            $comment->title = $request['title'];

            if($request->has('msg'))
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
                $product->rate = ($product->rate * $product->rate_count - $comment->rate + $request['rate']) / $product->rate_count;
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
        
        $user = $request->user();
        $validator = [
            'title' => 'required_without_all:rate|string|min:2',
            'rate' => 'required_without_all:title|integer|min:1|max:5',
            'negative' => 'nullable|array|min:1',
            'positive' => 'nullable|array|min:1',
            'msg' => 'nullable:rate,is_bookmark|string',
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


        if($request->has('rate') && $request['rate'] != $comment->rate) {
            $product->rate = ($product->rate * $product->rate_count - $comment->rate + $request['rate']) / ($product->rate_count * 1.0);
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
        
        $product->comment_count -= 1;
        $product->save();
        $comment->delete();

        return response()->json(['status' => 'ok']);
    }
}
