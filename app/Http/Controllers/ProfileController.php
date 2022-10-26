<?php

namespace App\Http\Controllers;

use App\Http\Resources\commentResourceWithProduct;
use App\Http\Resources\ProductDigestUser;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function addresses() {
        return view('shop.profile.profile-addresses');
    }

    public function comments(Request $request) {
        $comments = commentResourceWithProduct::collection
        (
            Comment::where('user_id', $request->user()->id)->whereNotNull('msg')->get()
        )->toArray($request);
        dd($comments);
        return view('shop.profile.profile-comments', compact('comments'));
    }
     
    public function favorites(Request $request) {
        
        $products = ProductDigestUser::collection
        (
            Product::whereIn('id', 
                Comment::where('user_id', $request->user()->id)->where('is_bookmark', true)->pluck('product_id')->toArray()
            )->get()
        )->toArray($request);
        // dd($products);
        return view('shop.profile.profile-favorites', compact('products'));
    }

    public function myOrderDetail() {
        return view('shop.profile.profile-my-order-detail');
    }
    
    public function myOrders() {
        return view('shop.profile.profile-my-orders');
    }

    public function notification() {
        return view('shop.profile.profile-notification');
    }
    
    
    public function personalInfo() {
        return view('shop.profile.profile-personal-info');
    }

    public function ticketsAdd() {
        return view('shop.profile.profile-tickets-add');
    }

    public function ticketsDetail() {
        return view('shop.profile.profile-tickets-detail');
    }
    
    public function tickets() {
        return view('shop.profile.profile-tickets');
    }

    public function history() {
        return view('shop.profile.profile-history');
    }

}
