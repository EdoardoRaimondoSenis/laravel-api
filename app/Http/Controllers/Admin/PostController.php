<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostsRequest;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {
        $data = $request->all();

        $post = Post::create($data);

        if (array_key_exists('technologies', $data)) {
            $post->technologies()->attach($data['technologies']);
        }

        if (array_key_exists(key:'img',array: $data)) {
            $img = Storage::put(path:'uploads',contents: $data['img']);
            $img_original_name = $request->file(key:'img')->getClientOriginalName();
            $data['img'] = $img;
            $data['img_original_name'] = $img_original_name;
        }

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);

        if (array_key_exists('technologies', $data)) {
            $post->sync($data['technologies']);
        } else {
            $post->technologies()->detach();
        }

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('delete', 'il post ' . $post->title . ' è stato eliminato');
    }
}
