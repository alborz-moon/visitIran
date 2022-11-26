<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventSessionResource;
use App\Models\Event;
use App\Models\EventSession;
use Illuminate\Http\Request;

class EventSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event, Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => EventSessionResource::collection($event->sessions)->toArray($request)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = [

        ];
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventSession  $eventSession
     * @return \Illuminate\Http\Response
     */
    public function show(EventSession $eventSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventSession  $eventSession
     * @return \Illuminate\Http\Response
     */
    public function edit(EventSession $eventSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventSession  $eventSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventSession $eventSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventSession  $eventSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventSession $eventSession)
    {
        //
    }
}
