<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Request $request)
    {
        
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
            'data' => CommentResource::collection($product->comments()->confirmed()->get())->toArray($request)
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
            'title' => 'required_without_all|string|min:2',
            'rate' => 'required_without_all:title,is_bookmark|integer|min:1|max:5',
            'is_bookmark' => 'required_without_all:title,rate|boolean',
            'negative' => 'nullable|string|min:2',
            'positive' => 'nullable|string|min:2',
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
                $comment->negative = $request['negative'];

            if($request->has('positive'))
                $comment->positive = $request['positive'];

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
    public function edit(Comment $comment)
    {
        //
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
        //
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
    }
}
