<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user() != null && 
            (
                $request->user()->level == User::$ADMIN_LEVEL ||
                $request->user()->level == User::$EDITOR_LEVEL 
            )
        )
            return view('admin.faq.list', ['items' => FAQ::all()]);
        
        return response()->json(
            [
                'status' => 'ok', 
                'data' => FAQ::visible()->orderBy('priority', 'asc')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'title' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'priority' => 'required|integer|min:1',
            'visibility' => 'nullable|boolean'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);

        $request->validate($validator);

        FAQ::create($request->toArray());
        return Redirect::route('faq.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('admin.faq.create', ['item' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        $validator = [
            'title' => 'nullable|string|min:2',
            'description' => 'nullable|string|min:2',
            'priority' => 'nullable|integer|min:1',
            'visibility' => 'nullable|boolean'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);

        $request->validate($validator);

        $faq->visibility = $request->has('visibility') ? $request['visibility'] : $faq->visibility;
        $faq->priority = $request->has('priority') ? $request['priority'] : $faq->priority;
        $faq->title = $request->has('title') ? $request['title'] : $faq->title;
        $faq->description = $request->has('description') ? $request['description'] : $faq->description;

        $faq->save();
        return Redirect::route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return response()->json(['status' => 'ok']);
    }
}
