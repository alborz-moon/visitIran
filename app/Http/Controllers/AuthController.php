<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function signUp(Request $request) {
        
        $validator = [
            'phone' => 'required|unique:users,phone|regex:/(09)[0-9]{9}/',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);

        $request->validate($validator);


        $activation = Activation::where('phone', $request["phone"])->first();

        if($activation != null) {
            if($activation->vc_expired_at < time())
                $activation->delete();
            else
                return response()->json([
                    "status" => "nok",
                    "msg" => "Older code has not expired yet.",
                    "reminder" => time() - $activation->vc_expired_at + 300
                ]);
        }

        $rand = random_int(111111, 999999);
        $request['code'] = $rand;
        $request['vc_expired_at'] = Carbon::now()->addMinutes(2)->timestamp;

        Activation::create($request->toArray());
        return response()->json(["status" => "ok", "reminder" => 120]);

    }

    public function activate(Request $request) {

        $validator = [
            "code" => 'required|integer|min:111111|max:999999',
            'phone' => 'required|regex:/(09)[0-9]{9}|exists:activations,phone',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);

        $request->validate($validator);

        $activation = Activation::where('phone', $request["phone"])
            ->where('code', $request["code"])->first();

        if($activation == null)
            return response()->json([
                "status" => "nok",
                "msg" => "code is incorrect"
            ]);
        else if($activation->vc_expired_at < time())
            return response()->json([
                "status" => "nok",
                "msg" => "code expired"
            ]);

        $user = new User();

        DB::transaction(function () use ($activation, $user) {

            $user->remember_token = Str::random(20);
            $user->level = User::$USER_LEVEL;
            $user->status = User::$ACTIVE;
            $user->phone = $activation->phone;

            $user->save();
            $activation->delete();

            Auth::login($user);
        });

        return response()->json([
            "status" => "ok"
        ]);
    }

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
            
            if($request->getHost() == self::$EVENT_SITE)
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
