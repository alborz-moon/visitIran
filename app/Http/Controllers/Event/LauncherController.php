<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;
use Illuminate\Http\Request;

class LauncherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = [];

        $request->validate();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function show(Launcher $launcher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function edit(Launcher $launcher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Launcher $launcher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Launcher $launcher)
    {
        //
    }
}
