<?php

namespace App\Http\Controllers\Event;

use App\Events\EventRegistry;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventBuyerResource;
use App\Models\Event;
use App\Models\EventBuyer;
use App\Models\User;
use App\Rules\NID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventBuyerController extends Controller
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
            'data' => EventBuyerResource::collection($event->buyers)->toArray($request)
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone' => 'required|regex:/(09)[0-9]{9}/',
            'nid' => ['nullable', 'regex:/[0-9]{10}/', new NID],
            'count' => 'required|integer|min:1|max:100',
            'paid' => 'required|integer|min:0',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator, self::$COMMON_ERRS);

        $request['event_id'] = $event->id;
        $user = User::where('phone', $request['phone'])->first();

        if($user != null)
            $request['user_id'] = $user->id;
        
        $tmp = EventBuyer::create($request->toArray());
        $createdAt = self::MiladyToShamsi3($tmp->created_at->timestamp);
        
        event(new EventRegistry(
            $request['phone'], $user != null && $user->mail != null ? $user->mail : null,
            $event->title, $request['paid'], $createdAt
        ));

        return response()->json([
            'status' => 'ok',
            'id' => $tmp->id,
            'created_at' => $createdAt
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventBuyer  $eventBuyer
     * @return \Illuminate\Http\Response
     */
    public function show(EventBuyer $eventBuyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventBuyer  $eventBuyer
     * @return \Illuminate\Http\Response
     */
    public function edit(EventBuyer $eventBuyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventBuyer  $eventBuyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventBuyer $eventBuyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventBuyer  $eventBuyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventBuyer $eventBuyer)
    {
        //
    }
}
