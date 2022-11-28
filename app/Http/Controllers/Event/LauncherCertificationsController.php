<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;
use App\Models\LauncherCert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LauncherCertificationsController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Launcher $launcher)
    {
        Gate::authorize('update', $launcher);
        
        $validator = [
            'img_file' => 'required|image'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $filename = $request->img_file->store('public/launchers');
        $filename = str_replace('public/launchers/', '', $filename);
        
        LauncherCert::create([
            'file' => $filename,
            'launcher_id' => $launcher->id
        ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LauncherCert  $launcherCert
     * @return \Illuminate\Http\Response
     */
    public function destroy(LauncherCert $launcherCert)
    {
        //
    }
}
