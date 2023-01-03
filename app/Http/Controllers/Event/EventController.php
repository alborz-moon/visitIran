<?php

namespace App\Http\Controllers\Event;

use App\Http\Resources\EventAdminDigest;
use App\Http\Resources\EventPhase1Resource;
use App\Http\Resources\EventPhase2Resource;
use App\Http\Resources\EventUserDigest;
use App\Http\Resources\EventUserResource;
use App\Http\Resources\LauncherVeryDigest;
use App\Models\Config;
use App\Models\Event;
use App\Models\EventComment;
use App\Models\EventTag;
use App\Models\Facility;
use App\Models\Launcher;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EventController extends EventHelper
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $states = State::orderBy('name', 'asc')->get();
        $mode = 'create';

        if($request->user()->isEditor()) {
            
            $launchers = LauncherVeryDigest::collection(Launcher::all())->toArray($request);
            // dd($launchers);
            return view('event.event.create-event', compact('states', 'mode', 'launchers'));
        }

        return view('event.event.create-event', compact('states', 'mode'));
    }

    public function edit(Event $event, Request $request) {
        
        if(!Gate::allows('update', $event))
            return Redirect::route('create-event');

        $states = State::orderBy('name', 'asc')->get();
        $mode = 'edit';
        $id = $event->id;
        
        if($request->user()->isEditor()) {
            $launchers = LauncherVeryDigest::collection(Launcher::all())->toArray($request);
            return view('event.event.create-event', compact('states', 'mode', 'id', 'launchers'));
        }

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

    public function changeStatus(Request $request) {

        $validator = [
            'status' => ['required', Rule::in(['pending', 'confirmed', 'rejected'])],
            'event_id' => 'required|exists:mysql2.events,id'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $event = Event::whereId($request['event_id'])->first();
        $event->status = $request['status'];
        $event->save();

        return response()->json(['status' => 'ok']);
    }

    
    public function changeIsInTopList(Request $request) {

        $validator = [
            'event_id' => 'required|exists:mysql2.events,id'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $event = Event::whereId($request['event_id'])->first();
        $event->is_in_top_list = !$event->is_in_top_list;
        $event->save();

        return response()->json(['status' => 'ok']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = self::build_filters($request, false, false)->get();
        $events = EventAdminDigest::collection($events)->toArray($request);
        
        $launcherFilter = $request->query('launcher', null);
        $tagFilter = $request->query('tag', null);
        $typeFilter = $request->query('type', null);
        $visibilityFilter = $request->query('visibility', null);
        $statusFilter = $request->query('status', null);
        $isInTopListFilter = $request->query('isInTopList', null);
        $orderByTypeFilter = $request->query('orderByType', null);
        $orderBy = $request->query('orderBy', null);

        $launchers = DB::select('select l.id, l.company_name from events.events e, events.launchers l where e.launcher_id = l.id group by l.id');
        $tags = DB::select('select label from events.event_tags where 1');

        $fromCreatedAt = $request->query('fromCreatedAt', null);
        $toCreatedAt = $request->query('toCreatedAt', null);

        return view('admin.event.list', [
            'items' => $events,
            'launchers' => $launchers,
            'tags' => $tags,
            'launcherFilter' => $launcherFilter,
            'fromCreatedAtFilter' => $fromCreatedAt,
            'toCreatedAtFilter' => $toCreatedAt,
            'isInTopListFilter' => $isInTopListFilter,
            'orderByType' => $orderByTypeFilter,
            'orderBy' => $orderBy,
            'tagFilter' => $tagFilter,
            'typeFilter' => $typeFilter,
            'statusFilter' => $statusFilter,
            'visibilityFilter' => $visibilityFilter
        ]);
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
        $isEditor = $request->user()->isEditor();

        if(!$isEditor)
            return response()->json([
                'status' => 'ok',
                'data' => EventPhase1Resource::make($event)->toArray($request)
            ]);

        $eventTmp = EventPhase1Resource::make($event)->toArray($request);
        $eventTmp['launcher'] = LauncherVeryDigest::make($event->launcher)->toArray($request);


        return response()->json([
            'status' => 'ok',
            'data' => $eventTmp
        ]);
    }

    public function getPhase2Info(Event $event, Request $request) {
        Gate::authorize('getPhaseInfo', $event);
        return response()->json([
            'status' => 'ok',
            'data' => EventPhase2Resource::make($event)->toArray($request)
        ]);
    }

    
    public function search(Request $request) {

        $validator = [
            // 'key' => 'required|persian_alpha|min:2|max:15',
            'key' => 'required|min:2|max:15',
            'tag' => 'nullable|string|exists:events.event_tags,name',
            'return_type' => ['required', Rule::in(['digest', 'card'])]
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $request['return_type'] = 'digest';

        $events = Event::like($request['key'], 
            $request->has('tag') ? $request['tag'] : null,
            $request['return_type']
        );

        
        // if($request['return_type'] == 'digest')
            return response()->json([
                'status' => 'ok',
                'data' => EventUserDigest::collection($events)->toArray($request)
            ]);
        // return response()->json([
        //     'status' => 'ok',
        //     'data' => ProductDigestUser::collection($products)->toArray($request)
        // ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {

        $validator = [
            // 'key' => 'nullable|persian_alpha|min:2|max:15'
        ];

        $validator = Validator::make($request->query(), $validator);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $limit = $request->query('limit', 30);
        $key = $request->query('key', null);
        $page = $request->query('page', 1);


        if($key != null && $page > 1)
            return abort(401);

        $filters = self::build_filters($request, true, $key != null);

        if($key == null) {
            
            if($limit != 30)
                $filters->where('is_in_top_list', true);

            $events = $filters->skip(($page - 1) * $limit)->take($limit)->get();
        }
        else {
            $events = Event::like($key, null, 'digest', $filters);
        }

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
            'start_registry_date' => ['required', 'regex:/^[1-4]\d{3}\/((((0[1-6])|([1-6]))\/((3[0-1])|([1-2][0-9])|((0[1-9])|([1-9]))))|((1[0-2]|(((0[7-9])|[7-9])))\/(30|([1-2][0-9])|(((0[1-9])|([1-9]))))))$/'],
            'start_registry_time' => 'required|date_format:H:i',
            'end_registry_date' => ['required', 'regex:/^[1-4]\d{3}\/((((0[1-6])|([1-6]))\/((3[0-1])|([1-2][0-9])|((0[1-9])|([1-9]))))|((1[0-2]|(((0[7-9])|[7-9])))\/(30|([1-2][0-9])|(((0[1-9])|([1-9]))))))$/'],
            'end_registry_time' => 'required|date_format:H:i',
            'ticket_description' => 'nullable|string|min:2',
            'price' => 'required|integer|min:0',
            'capacity' => 'nullable|integer|min:0',
            'site' => 'nullable|url',
            'email' => 'nullable|email',
            'phone_arr' => 'nullable|array|min:1',
            'phone_arr.*' => 'required|numeric|digits_between:7,11',
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);


        $phone_arr = [];
        if($request->has('phone_arr')) {
            
            foreach($request['phone_arr'] as $p) {
                array_push($phone_arr, $p);
            }
            

            $request['phone'] = implode('_', $phone_arr);
        }


        $request["start_registry"] = strtotime(self::ShamsiToMilady($request["start_registry_date"]) . " " . $request["start_registry_time"]);
        $request["end_registry"] = strtotime(self::ShamsiToMilady($request["end_registry_date"]) . " " . $request["end_registry_time"]);

        if($request['start_registry'] >= $request['end_registry'])
            return response()->json([
                'status' => 'nok',
                'msg' => 'زمان آغاز باید کوچک تر از زمان پایان باشد'
            ]);

            //todo: complete this section
        // if($request['end_registry'] > $event->start)
        //     return response()->json([
        //         'status' => 'nok',
        //         'msg' => 'زمان ثبت نام باید کوچک تر از زمان آغاز باشد'
        //     ]);

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
        $event->save();
        
        return response()->json(['status' => 'ok']);
    }

    public function set_main_img(Event $event, Request $request)
    {
        Gate::authorize('update', $event);

        $validator = [
            'main_img' => 'required|image'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        
        
        $filename = $request->main_img->store('public/events');
        $filename = str_replace('public/events/', '', $filename);   
            
        if($event->img != null && !empty($event->img) && 
            file_exists(__DIR__ . '/../../../../public/storage/events/' . $event->img))
            unlink(__DIR__ . '/../../../../public/storage/events/' . $event->img);

        $event->img = $filename;
        $event->save();
        
        return response()->json(['status' => 'ok']);
    }

    public function get_main_img(Event $event, Request $request)
    {           
        return response()->json(['status' => 'ok', 'img' => $event->img != null ? asset('storage/events/' . $event->img) : '']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event, string $slug)
    {
        if(!$event->visibility ||
            ($event->slug != null && $slug != $event->slug) ||
            ($event->slug == null && $slug != $event->title)
        )
            return Redirect::route('403');

        $event->seen = $event->seen + 1;
        $event->save();

        $user = $request->user();
        
        if($user == null)
            return view('event.event', [
                'event' => array_merge(
                    EventUserResource::make($event)->toArray($request), [
                        'is_bookmark' => false,
                        'user_rate' => null,
                        'has_comment' => false,
                    ]), 
                    'critical_point' => Config::where('site', 'event')->first()->critical_point,
                    'is_login' => false,
            ]);

        $comment = EventComment::userComment($event->id, $user->id);
        
        // dd(EventUserResource::make($event)->toArray($request));
        return view('event.event', [
            'event' => array_merge(
                EventUserResource::make($event)->toArray($request), 
                [
                    'is_bookmark' => $comment != null && $comment->is_bookmark != null ? $comment->is_bookmark : false,
                    'user_rate' => $comment != null ? $comment->rate : null,
                    'has_comment' => $comment != null && $comment->msg != null,
                ]), 
                'is_login' => true,
                'critical_point' => Config::where('site', 'event')->first()->critical_point,
        ]);
    }



    private function addOrUpdate(Request $request, $event = null) {

        $validator = [
            'title' => 'required|string|min:2',
            'age_description' => ['required', Rule::in(['child', 'teen', 'adult', 'all', 'old'])],
            'level_description' => ['required', Rule::in(['national', 'state', 'local', 'pro'])],
            'tags_arr' => 'required|array',
            'tags_arr.*' => 'required|exists:mysql2.event_tags,id',
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
            'launcher_id' => 'nullable|exists:mysql2.launchers,id'
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

        $isEditor = $request->user()->isEditor();
        if(
            (!$isEditor && $request->has('launcher_id')) ||
            ($isEditor && !$request->has('launcher_id'))
        )
            return abort(401);
            
        $request['tags'] = implode('_', $tags_arr);
        $request['language'] = implode('_', $lang_arr);

        unset($request['type']);
        unset($request['tags_arr']);
        unset($request['facilities_arr']);
        unset($request['language_arr']);

        if($event == null) {
            $request['launcher_id'] = $isEditor ? $request['launcher_id'] : $request->user()->launcher->id;
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

        if(!$isEditor)
            $event->status = 'pending';

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

        if($event->img != null && !empty($event->img) && 
            file_exists(__DIR__ . '/../../../../public/storage/events/' . $event->img)
        )
            unlink(__DIR__ . '/../../../../public/storage/events/' . $event->img);

        $event->delete();
        return response()->json(['status' => 'ok']);
    }
}