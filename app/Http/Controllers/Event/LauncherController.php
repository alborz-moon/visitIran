<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Launcher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = [
            'user_NID' => 'required|regex:/[0-9]{10}/',
            'user_email' => 'required|email',
            'user_birth_day' => 'required|date',
            'launcher_type' => ['required', Rule::in(['haghighi', 'hoghoghi'])],
            'company_name' => 'required_if:launcher_type,hoghoghi|string|min:2',
            'company_type' => 'required_if:launcher_type,hoghoghi|string|min:2',
            'postal_code' => 'required_if:launcher_type,hoghoghi|regex:/[1-9][0-9]{9}/',
            'code' => 'required_if:launcher_type,hoghoghi|numeric',
            'launcher_address' => 'required|string|min:2',
            'launcher_email' => 'nullable|email',
            'launcher_site' => 'nullable|string|min:2',
            'launcher_phone' => 'nullable|numeric',
            'launcher_city_id' => 'required|exists:mysql2.cities,id',
            'launcher_x' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'launcher_y' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request['launcher_type'] == 'haghighi') {
            $request['company_name'] = null;
            $request['company_type'] = null;
            $request['postal_code'] = null;
            $request['code'] = null;
        }

        $request['user_id'] = $request->user()->id;
        try {
            $launcher = Launcher::create($request->toArray());

            return response()->json([
                'status' => 'ok',
                'id' => $launcher->id
            ]);
        }
        catch(\Exception $x) {

            return response()->json([
                'status' => 'nok',
                'msg' => 'شما یکبار این فرم را پر کرده اید.'
            ]);

        }
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
        
        $validator = [
            'user_NID' => 'nullable|regex:/[0-9]{10}/',
            'user_email' => 'nullable|email',
            'user_birth_day' => 'nullable|date',
            'launcher_type' => ['nullable', Rule::in(['haghighi', 'hoghoghi'])],
            'company_name' => 'nullable|string|min:2',
            'company_type' => 'nullable|string|min:2',
            'postal_code' => 'nullable|regex:/[1-9][0-9]{9}/',
            'code' => 'nullable|numeric',
            'launcher_address' => 'nullable|string|min:2',
            'launcher_email' => 'nullable|email',
            'launcher_site' => 'nullable|string|min:2',
            'launcher_phone' => 'nullable|numeric',
            'launcher_city_id' => 'nullable|exists:mysql2.cities,id',
            'launcher_x' => ['nullable','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'launcher_y' => ['nullable','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'company_newspaper' => 'nullable|image',
            'company_last_changes' => 'nullable|image',
            'user_NID_card' => 'nullable|image',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request['launcher_type'] == 'haghighi') {
            $request['company_name'] = null;
            $request['company_type'] = null;
            $request['postal_code'] = null;
            $request['code'] = null;
        }

        

        try {
            $launcher = Launcher::create($request->toArray());

            return response()->json([
                'status' => 'ok',
                'id' => $launcher->id
            ]);
        }
        catch(\Exception $x) {

            return response()->json([
                'status' => 'nok',
                'msg' => 'شما یکبار این فرم را پر کرده اید.'
            ]);

        }

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
