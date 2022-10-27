<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return response()->json(
            [
                'status' => 'ok',
                'data' => AddressResource::collection($user->addresses)->toArray($request)
            ]
        );
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
            'name' => 'required|string|min:2',
            'x' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'y' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'recv_name' => 'required|string|min:2',
            'recv_last_name' => 'required|string|min:2',
            'recv_phone' => 'required|regex:/(09)[0-9]{9}/',
            'city_id' => 'required|exists:mysql2.cities,id',
            'postal_code' => 'required|regex:/[1-9][0-9]{9}/',
            'address' => 'required|string|min:2',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $request['user_id'] = $request->user()->id;
        Address::create($request->toArray());

        return response()->json(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        if($request->user()->id != $address->user_id)
            abort(401);
        
        $validator = [
            'name' => 'required|string|min:2',
            'x' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],             'long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'y' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],             'long' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'recv_name' => 'required|string|min:2',
            'recv_last_name' => 'required|string|min:2',
            'recv_phone' => 'required|regex:/(09)[0-9]{9}/',
            'city_id' => 'required|exists:mysql2.cities,id',
            'postal_code' => 'required|regex:/[1-9][0-9]{9}/',
            'address' => 'required|string|min:2',
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        
        foreach($request->keys() as $key) {
            
            if($key == '_token')
                continue;

            $address[$key] = $request[$key];
        }

        $request->save();
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        if($request->user()->id != $address->user_id)
            return abort(401);
        
        $address->delete();
        return response()->json(['status' => 'ok']);
    }
}
