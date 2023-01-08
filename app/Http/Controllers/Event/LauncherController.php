<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\LauncherDigest;
use App\Http\Resources\LauncherFilesResource;
use App\Http\Resources\LauncherFirstStepResource;
use App\Http\Resources\LauncherResourceAdmin;
use App\Models\Launcher;
use App\Models\LauncherComment;
use App\Models\User;
use App\Rules\NID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class LauncherController extends Controller
{

    private function build_query($request) {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.launcher.list', [
            'items' => LauncherResourceAdmin::collection(Launcher::all())->toArray($request)
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function showFiles(Request $request, Launcher $launcher)
    {

        Gate::authorize('update', $launcher);

        return response()->json([
            'status' => 'ok',
            'data' => LauncherFilesResource::make($launcher)->toArray($request)
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
        
        $isEditor = $request->user()->isEditor();

        $validator = [
            'user_phone' => $isEditor ? 'bail|required|regex:/(09)[0-9]{9}/|exists:users,phone' : 'nullable|string',
            'img_file' => 'required|image',
            'back_img_file' => 'nullable|image',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'about' => 'nullable|string',
            'phone' => 'required|regex:/(09)[0-9]{9}/|unique:mysql2.launchers,phone',
            'user_NID' => ['bail', 'required','regex:/[0-9]{10}/','unique:mysql2.launchers,user_NID', new NID],
            'user_email' => 'required|email|unique:mysql2.launchers,user_email',
            'user_birth_day' => 'required', //|date
            'launcher_type' => ['required', Rule::in(['haghighi', 'hoghoghi'])],
            'company_name' => 'required|string|min:2',
            'company_type' => ['required_if:launcher_type,hoghoghi', Rule::in(['agency', 'art', 'limit', 'spec', 'public'])],
            'postal_code' => 'required_if:launcher_type,hoghoghi|regex:/[1-9][0-9]{9}/',
            'code' => 'required_if:launcher_type,hoghoghi|numeric',
            'launcher_address' => 'required|string|min:2',
            'launcher_email' => 'nullable|email',
            'launcher_site' => 'nullable|string|min:2',
            'launcher_phone' => 'nullable|array|min:1',
            'launcher_phone.*' => 'required|numeric|digits_between:7,11',
            'launcher_city_id' => 'required|exists:mysql2.cities,id',
            'launcher_x' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'launcher_y' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('user_phone')) {
            $user = User::where('phone', $request['user_phone'])->first();
            if($user->launcher != null)
                return response()->json(['status' => 'nok', 'msg' => 'کاربر مدنظر این فرم را قبلا پر کرده است']);

            $request['user_id'] = $user->id;
        }
        else
            $request['user_id'] = $request->user()->id;


        if($request['launcher_type'] == 'haghighi') {
            $request['company_type'] = null;
            $request['code'] = null;
        }
        
        if($request->has('launcher_phone')) {
            $launcher_phone_str = "";

            foreach($request['launcher_phone'] as $itr)
                $launcher_phone_str .= $itr . '__';
            
            $request['launcher_phone'] = substr($launcher_phone_str, 0, strlen($launcher_phone_str) - 2);
        }

        if($request->has('img_file')) {
            $filename = $request->img_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
            $request['img'] = $filename;
        }

        if($request->has('back_img_file')) {
            $filename = $request->back_img_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
            $request['back_img'] = $filename;
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

    public function show_user(Request $request, Launcher $launcher) {
        
        if($launcher->status != 'confirmed')
            return Redirect::route(403);

        return response()->json([
            'status' => 'ok',
            'data' => LauncherDigest::make($launcher)->toArray($request)
        ]);
    }
    
    public function show_detail(Request $request, Launcher $launcher, string $slug) {
        
        if($launcher->status != 'confirmed')
            return Redirect::route(403);

        $launcher->seen = $launcher->seen + 1;
        $launcher->save();

        $user = $request->user();
        
        if($user == null)
            return view('event.launcher', [
                    'launcher' => array_merge(
                        LauncherDigest::make($launcher)->toArray($request), [
                            'is_bookmark' => false,
                            'user_rate' => null,
                            'has_comment' => false,
                        ]), 
                    'is_login' => false,
                ]);

                
        $comment = LauncherComment::userComment($launcher->id, $user->id);
        
        // dd(LauncherDigest::make($launcher)->toArray($request));
        return view('event.launcher', [
            'launcher' => array_merge(
                LauncherDigest::make($launcher)->toArray($request), 
                [
                    'is_bookmark' => $comment != null && $comment->is_bookmark != null ? $comment->is_bookmark : false,
                    'user_rate' => $comment != null ? $comment->rate : null,
                    'has_comment' => $comment != null && $comment->msg != null,
                ]), 
                'is_login' => true
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Launcher $launcher)
    {
        return response()->json([
            'status' => 'ok',
            'data' => LauncherFirstStepResource::make($launcher)->toArray($request)
        ]);
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
        Gate::authorize('update', $launcher);
        
        $validator = [
            'img_file' => 'nullable|image',
            'back_img_file' => 'nullable|image',
            'first_name' => 'nullable|string|min:2',
            'last_name' => 'nullable|string|min:2',
            'phone' => 'nullable|regex:/(09)[0-9]{9}/',
            'user_NID' => ['nullable', 'regex:/[0-9]{10}/', new NID],
            'user_email' => 'nullable|email',
            'user_birth_day' => 'nullable', //|date
            'launcher_type' => ['nullable', Rule::in(['haghighi', 'hoghoghi'])],
            'company_name' => 'nullable|string|min:2',
            'company_type' => ['nullable', Rule::in(['agency', 'art', 'limit', 'spec', 'public'])],
            'postal_code' => 'nullable|regex:/[1-9][0-9]{9}/',
            'code' => 'nullable|numeric',
            'about' => 'nullable|string',
            'launcher_address' => 'nullable|string|min:2',
            'launcher_email' => 'nullable|email',
            'launcher_site' => 'nullable|string|min:2',
            'launcher_phone' => 'nullable|array|min:1',
            'launcher_phone.*' => 'required|numeric|digits_between:7,11',
            'launcher_city_id' => 'nullable|exists:mysql2.cities,id',
            'launcher_x' => ['nullable','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'launcher_y' => ['nullable','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'company_newspaper_file' => 'nullable|image',
            'company_last_changes_file' => 'nullable|image',
            'user_nid_card_file' => 'nullable|image',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator, self::$COMMON_ERRS);

        if($request->has('phone') && $request['phone'] != $launcher->phone && 
            Launcher::where('phone', $request['phone'])->count() > 0
        )
            return response()->json([
                'status' => 'nok',
                'msg' => 'شماره وارد شده برای رابط در سیستم موجود است.'
            ]);

        if($request->has('user_NID') && $request['user_NID'] != $launcher->user_NID && 
            Launcher::where('user_NID', $request['user_NID'])->count() > 0
        )
            return response()->json([
                'status' => 'nok',
                'msg' => 'کد ملی وارد شده برای رابط در سیستم موجود است.'
            ]);


        if($request->has('user_email') && $request['user_email'] != $launcher->user_email && 
            Launcher::where('user_email', $request['user_email'])->count() > 0
        )
            return response()->json([
                'status' => 'nok',
                'msg' => 'پست الکترونیک وارد شده برای رابط در سیستم موجود است.'
            ]);

        if($request['launcher_type'] == 'haghighi') {
            $request['company_type'] = null;
            $request['code'] = null;
        }

        if($request->has('launcher_phone')) {
            $launcher_phone_str = "";

            foreach($request['launcher_phone'] as $itr)
                $launcher_phone_str .= $itr . '__';
            
            $request['launcher_phone'] = substr($launcher_phone_str, 0, strlen($launcher_phone_str) - 2);
        }
        
        if($request->has('img_file')) {
         
            $filename = $request->img_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
                
            if($launcher->img != null && !empty($launcher->img) && 
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->img))
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->img);

            $launcher->img = $filename;
        }

        if($request->has('back_img_file')) {
         
            $filename = $request->back_img_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
                
            if($launcher->back_img != null && !empty($launcher->back_img) && 
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->back_img))
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->back_img);

            $launcher->back_img = $filename;
        }

        if($request->has('company_newspaper_file')) {
         
            $filename = $request->company_newspaper_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
                
            if($launcher->company_newspaper != null && !empty($launcher->company_newspaper) && 
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_newspaper))
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_newspaper);

            $launcher->company_newspaper = $filename;
        }


        if($request->has('company_last_changes_file')) {
         
            $filename = $request->company_last_changes_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
                
            if($launcher->company_last_changes != null && !empty($launcher->company_last_changes) && 
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_last_changes))
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_last_changes);

            $launcher->company_last_changes = $filename;
        }



        if($request->has('user_nid_card_file')) {
         
            $filename = $request->user_nid_card_file->store('public/launchers');
            $filename = str_replace('public/launchers/', '', $filename);   
                
            if($launcher->user_NID_card != null && !empty($launcher->user_NID_card) && 
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->user_NID_card))
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->user_NID_card);

            $launcher->user_NID_card = $filename;
        }


        try {
            
            foreach($request->keys() as $key) {
                
                if($key == '_token' || $key == 'user_nid_card_file' || $key == 'img_file' ||
                    $key == 'back_img_file' ||
                    $key == 'company_last_changes_file' || $key == 'company_newspaper_file')
                    continue;


                $launcher[$key] = $request[$key];
            }

            $launcher->status = 'pending';
            $launcher->save();

            return response()->json([
                'status' => 'ok'
            ]);
        }
        catch(\Exception $x) {

            return response()->json([
                'status' => 'nok',
                'msg' => $x->getMessage()
            ]);

        }

    }

    public function removeFile(Launcher $launcher, Request $request) {


        Gate::authorize('update', $launcher);

        $request->validate([
            'mode' => ['required', Rule::in('news_paper', 'last_changes', 'NID', 'cert')],
            'id' => 'nullable|exists:mysql2.launcher_certifications,id'
        ]);

        if($request['mode'] === 'news_paper') {
            if($launcher->company_newspaper != null && !empty($launcher->company_newspaper) &&
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_newspaper)
            )
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_newspaper);
            
            $launcher->company_newspaper = null;
        }
        
        if($request['mode'] === 'last_changes') {
            if($launcher->company_last_changes != null && !empty($launcher->company_last_changes) &&
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_last_changes)
            )
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->company_last_changes);
            
            $launcher->company_last_changes = null;
        }
        
        if($request['mode'] === 'NID') {
            if($launcher->user_NID_card != null && !empty($launcher->user_NID_card) &&
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->user_NID_card)
            )
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $launcher->user_NID_card);
            
            $launcher->user_NID_card = null;
        }

        if($request['mode'] === 'cert') {

            if(!$request->has('id'))
                return abort(401);

            $cert = $launcher->certs()->where('id', $request['id'])->first();
            if($cert == null)
                return abort(401);

            if($cert->file != null && !empty($cert->file) &&
                file_exists(__DIR__ . '/../../../../public/storage/launchers/' . $cert->file)
            )
                unlink(__DIR__ . '/../../../../public/storage/launchers/' . $cert->file);
            
            $cert->delete();
            return response()->json(['status' => 'ok']);
        }

        $launcher->save();
        return response()->json(['status' => 'ok']);
    }

    public function changeStatus(Request $request) {

        $validator = [
            'status' => ['required', Rule::in(['pending', 'confirmed', 'rejected'])],
            'launcher_id' => 'required|exists:mysql2.launchers,id'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $launcher = Launcher::whereId($request['launcher_id'])->first();
        $launcher->status = $request['status'];
        $launcher->save();

        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Launcher  $launcher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Launcher $launcher)
    {
        Gate::authorize('destroy', $launcher);
        
        //todo : check dependencies
        //todo : remove dependencies
        //todo : remove files

        $launcher->delete();
        return response()->json(['status' => 'ok']);
    }
}
