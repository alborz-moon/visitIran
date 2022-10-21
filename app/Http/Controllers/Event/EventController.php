<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventUserDigest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{

    private function build_filters($request, $justVisibles=false) {
        
        $filters = Event::where('id', '>', '0');
        $launcher = $request->query('launcher', null);
        $tag = $request->query('tag', null);
        $visibility = $request->query('visibility', null);
        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);
        $isInTopList = $request->query('isInTopList', null);
        $off = $request->query('off', null);
        $comment = $request->query('comment', null);

        $fromCreatedAt = $request->query('fromCreatedAt', null);
        $toCreatedAt = $request->query('toCreatedAt', null);

        if($launcher != null)
            $filters->where('launcher_id', $launcher);
            
        if($tag != null)
            $filters->whereRaw("'{$tag}' LIKE tags");
            
        if($isInTopList != null)
            $filters->where('is_in_top_list', $isInTopList);
            
        if($fromCreatedAt != null)
            $filters->whereDate('created_at', '>=', self::ShamsiToMilady($fromCreatedAt));
            
        if($toCreatedAt != null)
            $filters->whereDate('created_at', '<=', self::ShamsiToMilady($toCreatedAt));

        $isAdmin = false;

        if($request->user() != null && (
            $request->user()->level == User::$ADMIN_LEVEL ||
            $request->user()->level == User::$EDITOR_LEVEL
        )) {
            
            $isAdmin = true;

            if($visibility != null)
                $filters->where('visibility', $visibility);
                
            if($comment != null) {
                if($comment)
                    $filters->where('new_comment_count', 0);
                else
                    $filters->where('new_comment_count', '>', 0);
            }

            if($off != null) {
                $today = (int)self::getToday()['date'];
                if($off)
                    $filters->whereNotNull('off')->where('off_expiration', '>=', $today);
                else
                    $filters->where(function ($query) use ($today) {
                        $query->whereNull('off')->orWhere('off_expiration', '<', $today);
                    });
            }

        }
        else
            $filters->where('visibility', true);

        if($justVisibles && $isAdmin)
            $filters->where('visibility', true);

        if($orderByType == null || (
                $orderByType != 'asc' && 
                $orderByType != 'desc'
        ))
            $orderByType = 'desc';

        if($orderBy != null) {
            if($orderBy == 'createdAt')
                $filters->orderBy('id', $orderByType);
            else if(in_array($orderBy, ['rate', 'seen', 'price', 
                'rate_count', 'comment_count', 'new_comment_count', 'sell_count']))
                $filters->orderBy($orderBy, $orderByType);
        }
        else {
            $orderBy = 'createAt';
            $orderByType = 'desc';
            if($isAdmin)
                $filters->orderBy('id', 'desc');
            else
                $filters->orderBy('priority', 'asc');
        }

        return $filters;
    }

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $params = [];
        foreach($request->query() as $key => $val) {
            $params[str_replace('amp;', '', $key)] = $val;
        }

        $limit = $params['limit'];
        
        $filters = $this->build_filters($request, true);
        $events = $filters->paginate($limit == null ? 30 : $limit);

        return response()->json([
            'status' => 'ok',
            'data' =>  EventUserDigest::collection($events)->toArray($request)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
