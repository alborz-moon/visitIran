<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogDigest;
use App\Http\Resources\BlogDigestUser;
use App\Http\Resources\BlogResource;
use App\Imports\BlogImport;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
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
        ) {
            return view('admin.blogs.list', [
                'items' => BlogDigest::collection(Blog::all())->toArray($request)
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'data' => BlogDigestUser::collection(Blog::orderBy('priority', 'asc')->take(6)->get())->toArray($request)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => BlogDigestUser::collection(Blog::orderBy('priority', 'asc')->take(6)->get())->toArray($request)
        ]);
    }

    public function addBatch(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $import = new BlogImport;
        $import->import($request->file);
        $errors = [];

        foreach ($import->failures() as $failure) {
            array_push($errors, "row " . $failure->row() . ' ' . $failure->errors()[0]);
        }
        
        if(count($errors) > 0)
            return view('admin.blogs.list')->with(compact('errors'));

        return redirect()->route('blog.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'header' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'digest' => 'required|string|min:2',
            'keywords' => 'nullable|string|min:2',
            'alt' => 'nullable|string|min:2',
            'tags' => 'nullable|string|min:2',
            'article_tags' => 'nullable|string|min:2',
            'visibility' => 'nullable|boolean',
            'priority' => 'required|integer|min:1',
            'img_file' => 'nullable|image',
            'slug' => 'nullable|string|min:2|unique:blogs'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('img')) {
            $filename = $request->img_file->store('public/blogs');
            $filename = str_replace('public/blogs/', '', $filename);

            $request['img'] = $filename;
        }

        Blog::create($request->toArray());
        return Redirect::route('blog.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, Request $request, $err = null)
    {
        return view('admin.blogs.create', [
            'item' => BlogResource::make($blog)->toArray($request),
            'err' => $err
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = [
            'header' => 'nullable|string|min:2',
            'description' => 'nullable|string|min:2',
            'digest' => 'nullable|string|min:2',
            'keywords' => 'nullable|string|min:2',
            'alt' => 'nullable|string|min:2',
            'tags' => 'nullable|string|min:2',
            'article_tags' => 'nullable|string|min:2',
            'visibility' => 'nullable|boolean',
            'priority' => 'nullable|integer|min:1',
            'img_file' => 'nullable|image',
            'slug' => 'nullable|string|min:2'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('slug') && $request['slug'] != $blog->slug && 
            Blog::where('slug', $request['slug'])->count() > 0)
            return $this->edit($blog, $request, 'slug وارد شده در سیستم موجود است.');

        if($request->has('img_file')) {
         
            $filename = $request->img_file->store('public/blogs');
            $filename = str_replace('public/blogs/', '', $filename);   

            if($blog->img != null && !empty($blog->img) && 
                file_exists(__DIR__ . '/../../../public/storage/blogs/' . $blog->img))
                unlink(__DIR__ . '/../../../public/storage/blogs/' . $blog->img);

            $blog->img = $filename;
        }

        foreach($request->keys() as $key) {
            
            if($key == '_token' || $key == 'img_file')
                continue;

            $blog[$key] = $request[$key];
        }
        
        $blog->save();
        return Redirect::route('blog.index');
    }
    

    /**
     * Show the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog = null)
    {
        if($blog == null)
            abort(401);

        return response()->json([
            'status' => 'ok',
            'data' => BlogResource::make($blog)->toJson()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        
        if($blog->img != null && !empty($blog->img) &&
            file_exists(__DIR__ . '/../../../public/storage/blogs/' . $blog->img))
            unlink(__DIR__ . '/../../../public/storage/blogs/' . $blog->img);

        return response()->json(['status' => 'ok']);
    }
}
