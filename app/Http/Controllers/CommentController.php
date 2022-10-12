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
        if($comment == null) {
            $comment = new Comment();
            $comment->product_id = $product->id;
            $comment->user_id = $user->id;
        }

        if($request->has('msg'))
            $comment->msg = $request['msg'];

        if($request->has('rate'))
            $comment->rate = $request['rate'];

        if($request->has('is_bookmark'))
            $comment->is_bookmark = $request['is_bookmark'];
        
        $comment->save();
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
