<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;
use App\Models\LauncherBank;
use Illuminate\Http\Request;

class LauncherBankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Launcher $launcher)
    {
        //
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

        LauncherBank::create($request->toArray());

        return response()->json([
            'status' => 'ok'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LauncherBank  $launcherBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(LauncherBank $launcherBank)
    {
        //
    }
}
