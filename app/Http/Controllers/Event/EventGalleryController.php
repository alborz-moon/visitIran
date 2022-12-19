<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventGalleryResource;
use App\Models\Event;
use App\Models\EventGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event, Request $request)
    {
        Gate::authorize('update', $event);
        return response()->json([
            'status' => 'ok',
            'data' => EventGalleryResource::collection($event->galleries)->toArray($request)
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
        Gate::authorize('update', $event);
        
        $validator = [
            'img_file' => 'required|image'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $filename = $request->img_file->store('public/events');
        $filename = str_replace('public/events/', '', $filename);
        
        $tmp = EventGallery::create([
            'img' => $filename,
            'event_id' => $event->id,
            'priority' => 1000
        ]);

        return response()->json([
            'status' => 'ok',
            'id' => $tmp->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventGallery $gallery=null)
    {

        if($gallery == null)
            return abort(401);
        
        Gate::authorize('destroy', $gallery->event);
     
        if(file_exists(__DIR__ . '/../../../../public/storage/events/' . $gallery->img))
            unlink(__DIR__ . '/../../../../public/storage/events/' . $gallery->img);

        $gallery->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
