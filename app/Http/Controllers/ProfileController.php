<?php

namespace App\Http\Controllers;

use App\Models\State;

class ProfileController extends Controller
{
    
    public function addresses() {
        $states = State::orderBy('name', 'asc')->get();
        return view('shop.profile.profile-addresses', compact('states'));
    }

    public function comments() {
        return view('shop.profile.profile-comments');
    }
     
    public function favorites() {
        return view('shop.profile.profile-favorites');
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
