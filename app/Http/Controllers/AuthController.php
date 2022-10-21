<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'phone' => 'required|regex:/(09)[0-9]{9}/',
            'password' => 'required'
        ]);

        $user = User::where('phone', '=', $request['phone'])->first();
        if($user == null || !Hash::check($request['password'], $user->password))
            return view('admin.login', ['err' => 'نام کاربری و یا رمزعبور اشتباه است.']);

        if($user->status !== User::$ACTIVE)
            return view('admin.login', ['err' => 'حساب کاربری شما غیرفعال است.']);

        Auth::login($user);

        if($user->level != User::$USER_LEVEL) {
            
            if($request->getHost() == 'localevent.com')
                return Redirect::route('event.panel');

            return Redirect::route('shop.panel');
        }

        return Redirect::route('home');
    }

    public function logout(Request $request) {
        Auth::logout($request->user());
        return Redirect::route('home');
    }
}
