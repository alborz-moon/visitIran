<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventUserDigest;
use App\Models\Event;
use App\Models\EventTag;
use App\Models\Facility;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function create(Request $request)
    {
        $user = $request->user();
        
        if($user->launcher()->active()->first() == null)
            return view('errors.403');

        $states = State::orderBy('name', 'asc')->get();
        $mode = 'create';
        return view('event.event.create-event', compact('states', 'mode'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'title' => 'required|string|min:2',
            'age_description' => ['required', Rule::in(['child', 'teen', 'adult'])],
            'level_description' => ['required', Rule::in(['elemantary', 'intermediate', 'advance', 'pro'])],
            'tags_arr' => 'required|array',
            'tags_arr.*' => 'required|integer|exists:mysql2.event_tags,id',
            'language' => ['required', Rule::in(['fa', 'en', 'ar', 'fr', 'gr'])],
            'facilities_arr' => 'nullable|array',
            'facilities_arr.*' => 'required|integer|exists:mysql2.event_facilities,id',
            'type' => ['required', Rule::in(['haghighi', 'hoghoghi'])],
            'x' => ['required_if:type,hoghoghi','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'y' => ['required_if:type,hoghoghi','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'city_id' => 'required_if:type,hoghoghi|exists:mysql2.cities,id',
            'address' => 'required_if:type,hoghoghi|string|min:2',
            'link' => 'required_if:type,haghighi|url',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('link') && $request['type'] == 'hoghoghi')
            return abort(401);

        if(
            (
                $request->has('address') || $request->has('city_id') || 
                $request->has('x') || $request->has('y')
            ) && $request['type'] == 'hoghoghi'
        )
            return abort(401);


        $tags_arr = [];
        foreach($request['tags_arr'] as $tagId) {
            $tag = EventTag::whereId($tagId)->first();
            if($tag != null)
                array_push($tags_arr, $tag->label);
        }

        if($request->has('facilities_arr')) {
            $facilities_arr = [];
            foreach($request['facilities_arr'] as $facId) {
                $facility = Facility::whereId($facId)->first();
                if($facility != null)
                    array_push($facilities_arr, $facility->label);
            }
            $request['facilities'] = implode('_', $facilities_arr);
        }

        $request['tags'] = implode('_', $tags_arr);
        $request['launcher_id'] = $request->user()->id;
        $request['type'] = null;

        $event = Event::create($request->toArray());

        return response()->json([
            'status' => 'ok',
            'id' => $event->id
        ]);
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
