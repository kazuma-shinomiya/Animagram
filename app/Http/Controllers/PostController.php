<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Storage;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request){
        $posts = Post::orderBy('created_at', 'asc')->categoryAt($request->category)->paginate(6);
        $param = array('category' => $request->category);
        return view('posts.index', compact('posts', 'param'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(PostRequest $request, Post $post){
        $post->fill($request['post']);
        if(!empty($request->image)){
            $image = $request->file('image'); 
            $path = Storage::disk('s3')->putFile('animals', $image, 'public');
            $post->image_url = Storage::disk('s3')->url($path);
        }
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post){
        $post->fill($request['post'])->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);
        return redirect()->route('posts.index');
    }

    public function unlike(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        return redirect()->route('posts.index');
    }
}
