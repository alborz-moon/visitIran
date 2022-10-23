<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
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
            'data' => FacilityResource::collection(Facility::all())->toArray($request)
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
        
        Facility::create($request->toArray());
        return response()->json(['status' => 'ok']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Facility $facility, Request $request)
    {
        $validator = [
            'label' => 'required|string|min:2'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);
        
        $request->validate($validator);
        $facility->label = $request['label'];
        $facility->save();
        
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $deleted = $facility->delete();
        if($deleted)
            return response()->json(['status' => 'ok']);
            
        return response()->json([
            'status' => 'nok', 
            'msg' => 'رویدادی از این آیتم استفاده می کند و امکان حذف آن وجود ندارد.'
        ]);
    }
}
