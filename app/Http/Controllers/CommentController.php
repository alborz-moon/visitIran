<?php

namespace App\Http\Controllers;

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
        //
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
            'msg' => 'required_without_all:rate,is_bookmark|string',
            'rate' => 'required_without_all:msg,is_bookmark|integer|min:1|max:5',
            'is_bookmark' => 'required_without_all:msg,rate|boolean'
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
            if($request->has('msg')) {
                $product->comment_count = $product->comment_count + 1;
                $needUpdateProductTable = true;
            }
        }

        if($request->has('msg')) {
            
            $comment->msg = $request['msg'];
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
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
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
        //
    }
}
