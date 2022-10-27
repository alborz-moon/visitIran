<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\State;
use Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function uploadImg(Request $request) {

        $request->validate([
            'upload' => 'required|image'
        ]);

        $filename = $request->upload->save('public/ck');
        $filename = str_replace('public/ck/', '', $filename);

        return response()->json(['status' => 'ok', 'url' => asset('storage/ck/' . $filename)]);
    }

    public function getDesc(Category $category = null) {
        
        if($category == null) {
            return response()->json([
                'status' => 'ok',
                'data' => Config::first()->desc_default
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'data' => Config::first()->desc_default
        ]);
    }

    public function getCities(Request $request) {
        
        $request->validate([
            'state_id' => 'required|exists:mysql2.states,id'
        ]);

        return response()->json([
            'status' => 'ok',
            'data' => State::whereId($request['state_id'])->first()->cities()->orderBy('name', 'asc')->get()
        ]);

    }
}
