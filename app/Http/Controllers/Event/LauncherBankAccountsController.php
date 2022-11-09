<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\LauncherBankAccountResource;
use App\Models\Launcher;
use App\Models\LauncherBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LauncherBankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Launcher $launcher)
    {
        
        if($request->user()->id != $launcher->user_id)
            return abort(401);

        return LauncherBankAccountResource::collection($launcher->banks)->toArray($request);

    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Launcher $launcher)
    {
        
        $validator = [
            'shaba_no' => 'required|digits:24'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $request['launcher_id'] = $launcher->id;
        $request['is_default'] = false;

        $bank = LauncherBank::create($request->toArray());

        return response()->json([
            'status' => 'ok',
            'data' => 
                LauncherBankAccountResource::make($bank)->toArray($request)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LauncherBank  $launcherBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LauncherBank $launcherBank)
    {

        $launcher = $launcherBank->launcher;

        if($request->user()->id != $launcher->user_id)
            return abort(401);

        $validator = [
            'is_default' => 'required|boolean'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        DB::update('update launcher_bank_accounts set is_default = false where launcher_id = '. $launcher->id);
        $launcherBank->is_default = true;
        $launcherBank->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LauncherBank  $launcherBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, LauncherBank $launcherBank)
    {
        
        $launcher = $launcherBank->launcher;

        if($request->user()->id != $launcher->user_id)
            return abort(401);

        $launcher->delete();
        
        return response()->json([
            'status' => 'ok'
        ]);
    }
}
