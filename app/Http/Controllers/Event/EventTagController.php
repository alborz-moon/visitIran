<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventTagResource;
use App\Models\EventTag;
use Illuminate\Http\Request;

class EventTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => EventTagResource::collection(EventTag::all())->toArray($request)
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
        $validator = [
            'label' => 'required|string|min:2'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);
        
        $request->validate($validator);

        EventTag::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EventTag $eventTag
     * @return \Illuminate\Http\Response
     */
    public function update(EventTag $eventTag, Request $request)
    {
        $validator = [
            'label' => 'required|string|min:2'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);
        
        $request->validate($validator);
        $eventTag->label = $request['label'];
        $eventTag->save();
        
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EventTag  $eventTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventTag $eventTag)
    {
        $deleted = $eventTag->delete();
        if($deleted)
            return response()->json(['status' => 'ok']);
            
        return response()->json([
            'status' => 'nok', 
            'msg' => 'رویدادی از این آیتم استفاده می کند و امکان حذف آن وجود ندارد.'
        ]);
    }
}
