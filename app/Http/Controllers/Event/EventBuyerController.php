<?php

namespace App\Http\Controllers\Event;

use App\Events\EventRegistry;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventBuyerResource;
use App\Http\Resources\EventSessionResource;
use App\Http\Resources\MyEventsDigest;
use App\Models\Event;
use App\Models\EventBuyer;
use App\Models\User;
use App\Rules\NID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


    public function callback(Request $request) {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventBuyer  $eventBuyer
     * @return \Illuminate\Http\Response
     */
    public function show(EventBuyer $eventBuyer, Request $request)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://sep.shaparak.ir/onlinepg/onlinepg");
        curl_setopt($ch, CURLOPT_POST, 1);

        $payload = json_encode([
            "action" => "token",
            "TerminalId" => "13158674",
            "Amount" => 100000,
            "ResNum" => time(),
            "RedirectUrl" => route('event.callback'),
            "CellNumber" => $request->user()->phone
        ]);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Accept:application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);

        dd($server_output);


        // $event = $eventBuyer->event;

        // $validationUrl = 'https://techvblogs.com/blog/generate-qr-code-laravel-8';

        // $filename = 'tmp/' . time() . '.png';
        // QrCode::size(100)->generate($validationUrl, storage_path($filename));

        // $data = [
        //     'title' => $event->title,
        //     'launcher' => $event->launcher->company_name,
        //     'type' => $event->city_id == null ? 'مجازی' : 'حضوری',
        //     'address' => $event->city_id == null ? $event->link : $event->address,
        //     'name' => $eventBuyer->first_name . ' ' . $eventBuyer->last_name,
        //     'phone' => $eventBuyer->phone,
        //     'tel' => $eventBuyer->tel,
        //     'email' => $eventBuyer->email,
        //     'site' => $eventBuyer->site,
        //     'count' => $eventBuyer->count,
        //     'ticket_desc' => $event->ticket_description,
        //     'nid' => $eventBuyer->nid,
        //     'created_at' => self::MiladyToShamsi3($eventBuyer->created_at->timestamp),
        //     'paid' => $eventBuyer->paid,
        //     'qr' => storage_path($filename),
        //     'days' => EventSessionResource::collection($event->sessions)->toArray($request)
        // ];

        // view()->share('data', $data);

        // $pdf = Pdf::loadView('event.event.ticket', $data, [], 
        //     [
        //         'format' => 'A5-L',
        //         'display_mode' => 'fullpage'
        //     ]
        // );
        // return $pdf->download('pdf_file.pdf');
        // // return view('event.event.ticket', compact('data'));

    }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\EventBuyer  $eventBuyer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(EventBuyer $eventBuyer)
    // {
    //     $event = $eventBuyer->event;
    //     $data = [
    //         'title' => $event->title,
    //         'name' => $eventBuyer->first_name . ' ' . $eventBuyer->last_name,
    //         'phone' => $eventBuyer->phone,
    //         'nid' => $eventBuyer->nid,
    //         'created_at' => self::MiladyToShamsi3($eventBuyer->created_at->timestamp),
    //         'paid' => $eventBuyer->paid
    //     ];
    //     view()->share('data', $data);

    //     $pdf = Pdf::loadView('event.event.ticket', $data, [], 
    //         [
    //             'format' => 'A5-L',
    //             'display_mode' => 'fullpage'
    //         ]
    //     );
    //     return $pdf->download('pdf_file.pdf');
    //     // return view('event.event.receipt', compact('data'));

    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => MyEventsDigest::collection(EventBuyer::where('user_id', $request->user()->id)->get())->toArray($request)
        ]);
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
