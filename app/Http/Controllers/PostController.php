<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Storage;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Libraries\RankingService;

class PostController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Request $request){
        $posts = Post::orderBy('created_at', 'desc')
                    ->categoryAt($request->category)
                    ->keywordAt($request->keyword)
                    ->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }
    
    public function show(Post $post){
        $comments = $post->comments->sortByDesc('created_at');
        $ranking = new RankingService;
        $ranking->incrementViewRanking($post->id);
        return view('posts.show', compact('post', 'comments'));
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
        $post->fill($request['post']);
        if(!empty($request->image)){
            $image = $request->file('image'); 
            $path = Storage::disk('s3')->putFile('animals', $image, 'public');
            $post->image_url = Storage::disk('s3')->url($path);
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $image_url_s3 = str_replace('https://animal-blog.s3.ap-northeast-1.amazonaws.com/', '', $post->image_url);
        Storage::disk('s3')->delete($image_url_s3);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function like(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        $post->likes()->attach($request->user()->id);
        return [
            'id' => $post->id,
            'countLikes' => $post->likes()->count()
        ];
    }

    public function unlike(Request $request, Post $post){
        $post->likes()->detach($request->user()->id);
        return [
            'id' => $post->id,
            'countLikes' => $post->likes()->count()
        ];
    }
    
    public function ranking(Post $post){
        $ranking = new RankingService;
        $results = $ranking->getRankingAll();
        $posts_ranking = $post->getPostRanking($results);
        return view('posts.ranking', compact('posts_ranking'));
    }
}
