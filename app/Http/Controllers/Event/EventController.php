<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventPhase1Resource;
use App\Http\Resources\EventPhase2Resource;
use App\Http\Resources\EventUserDigest;
use App\Models\Event;
use App\Models\EventTag;
use App\Models\Facility;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
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
        
        if($user->level != User::$ADMIN_LEVEL && $user->launcher()->active()->first() == null)
            return view('errors.403');

        $states = State::orderBy('name', 'asc')->get();
        $mode = 'create';
        return view('event.event.create-event', compact('states', 'mode'));
    }

    public function edit(Event $event) {
        
        if(!Gate::allows('update', $event))
            return Redirect::route('create-event');

        $states = State::orderBy('name', 'asc')->get();
        $mode = 'edit';
        $id = $event->id;

        return view('event.event.create-event', compact('states', 'mode', 'id'));
    }

    public function addGalleryToEvent(Event $event=null) {

        if($event == null || !Gate::allows('update', $event))
            return Redirect::route('create-event');

        return view('event.event.create-info', ['id' => $event->id]);

    }

    public function addSessionsInfo(Event $event=null) {
        
        if($event == null || !Gate::allows('update', $event))
            return Redirect::route('create-event');

        return view('event.event.create-time', ['id' => $event->id]);
    }
    
    public function addPhase2Info(Event $event=null) {
        
        if($event == null || !Gate::allows('update', $event))
            return Redirect::route('create-event');

        return view('event.event.create-contact', ['id' => $event->id]);
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

    public function getDesc(Event $event, Request $request) {
        Gate::authorize('getPhaseInfo', $event);
        return response()->json([
            'status' => 'ok',
            'data' => $event->description
        ]);
    }

    public function getPhase1Info(Event $event, Request $request) {
        Gate::authorize('getPhaseInfo', $event);
        return response()->json([
            'status' => 'ok',
            'data' => EventPhase1Resource::make($event)->toArray($request)
        ]);
    }

    public function getPhase2Info(Event $event, Request $request) {
        Gate::authorize('getPhaseInfo', $event);
        return response()->json([
            'status' => 'ok',
            'data' => EventPhase2Resource::make($event)->toArray($request)
        ]);
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
        return $this->addOrUpdate($request);
    }


    public function store_phase2(Event $event, Request $request)
    {

        Gate::authorize('update', $event);

        $validator = [
            'start_registry_date' => ['required', 'regex:/^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/'],
            'start_registry_time' => 'required|date_format:H:i',
            'end_registry_date' => ['required', 'regex:/^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/'],
            'end_registry_time' => 'required|date_format:H:i',
            'ticket_description' => 'nullable|string|min:2',
            'price' => 'required|integer|min:0',
            'capacity' => 'nullable|integer|min:0',
            'site' => 'nullable|url',
            'mail' => 'nullable|email',
            'phone_arr' => 'nullable|array|min:1',
            'phone_arr.*' => 'required|numeric|digits_between:7,11',
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);


        if($request->has('phone_arr')) {
            $phone_arr = [];
            foreach($request['phone_arr'] as $p) {
                array_push($phone_arr, $p);
            }
        }


        $request["start_registry"] = strtotime(self::ShamsiToMilady($request["start_registry_date"]) . " " . $request["start_registry_time"]);
        $request["end_registry"] = strtotime(self::ShamsiToMilady($request["end_registry_date"]) . " " . $request["end_registry_time"]);

        if($request['start_registry'] >= $request['end_registry'])
            return response()->json([
                'status' => 'nok',
                'msg' => 'زمان آغاز باید کوچک تر از زمان پایان باشد'
            ]);

        if($request['end_registry'] > $event->start)
            return response()->json([
                'status' => 'nok',
                'msg' => 'زمان ثبت نام باید کوچک تر از زمان آغاز باشد'
            ]);

        $request['phone'] = implode('_', $phone_arr);

        unset($request['start_registry_date']);
        unset($request['start_registry_time']);
        unset($request['end_registry_date']);
        unset($request['end_registry_time']);
        unset($request['phone_arr']);

        foreach($request->keys() as $key) {
            
            if($key == '_token')
                continue;

            $event[$key] = $request[$key];
        }

        $event->save();
        return response()->json(['status' => 'ok']);
    }

    public function store_desc(Event $event, Request $request)
    {
        Gate::authorize('update', $event);

        $validator = [
            'description' => 'required|string|min:2'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $event->description = $request['description'];
        $request->save();
        
        return response()->json(['status' => 'ok']);
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



    private function addOrUpdate(Request $request, $event = null) {

        $validator = [
            'title' => 'required|string|min:2',
            'age_description' => ['required', Rule::in(['child', 'teen', 'adult', 'all', 'old'])],
            'level_description' => ['required', Rule::in(['national', 'state', 'local', 'pro'])],
            'tags_arr' => 'required|array',
            'tags_arr.*' => 'required|integer|exists:mysql2.event_tags,id',
            'language_arr' => 'required|array',
            'language_arr.*' => ['required', Rule::in(['fa', 'en', 'ar', 'fr', 'gr', 'tr'])],
            'facilities_arr' => 'nullable|array',
            'facilities_arr.*' => 'required|integer|exists:mysql2.event_facilities,id',
            'type' => ['required', Rule::in(['online', 'offline'])],
            'x' => ['required_if:type,offline','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'y' => ['required_if:type,offline','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'city_id' => 'required_if:type,offline|exists:mysql2.cities,id',
            'postal_code' => 'required_if:type,offline|regex:/[1-9][0-9]{9}/',
            'address' => 'required_if:type,offline|string|min:2',
            'link' => 'required_if:type,online|url',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('link') && $request['type'] == 'offline')
            return abort(401);

        if(
            (
                $request->has('address') || $request->has('city_id') || 
                $request->has('x') || $request->has('y')
            ) && $request['type'] == 'online'
        )
            return abort(401);

        $lang_arr = [];
        foreach($request['language_arr'] as $lang)
            array_push($lang_arr, $lang);


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
        $request['language'] = implode('_', $lang_arr);

        unset($request['type']);
        unset($request['tags_arr']);
        unset($request['facilities_arr']);
        unset($request['language_arr']);

        if($event == null) {
            $request['launcher_id'] = $request->user()->launcher->id;
            $event = Event::create($request->toArray());

            return response()->json([
                'status' => 'ok',
                'id' => $event->id
            ]);
        }

        foreach($request->keys() as $key) {
            
            if($key == '_token')
                continue;

            $event[$key] = $request[$key];
        }

        $event->save();
        return response()->json(['status' => 'ok']);

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
        Gate::authorize('update', $event);
        return $this->addOrUpdate($request, $event);
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
