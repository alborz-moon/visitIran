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
    public function store(Event $event, Request $request)
    {
        $validator = [
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date',
            'end_time' => 'required|date_format:H:i'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $request["start"] = strtotime(self::ShamsiToMilady($request["start_date"]) . " " . $request["start_time"]);
        $request["end"] = strtotime($request["end_date"] . " " . $request["end_time"]);

        $request['event_id'] = $event->id;
        $request['start_date'] = null;

        $session = EventSession::create($request->toArray());

        return response()->json([
            'status' => 'ok',
            'id' => $session->id
        ]);
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
