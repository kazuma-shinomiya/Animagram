<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Storage;

class UserController extends Controller
{
    public function show(string $name){
        $user = User::where('name', $name)->first();
        $posts = $user->posts->sortByDesc('created_at');
        return view('users.show', compact('user', 'posts'));
    }
    
    public function edit(string $name){
        $user = User::where('name', $name)->first();
        return view('users.edit', compact('user'));
    }
    
    public function update(UserRequest $request, string $name){
        $user = User::where('name', $name)->first();
        $user->fill($request->all());
        $user->name = $request->name;
        if(!empty($request->image)){
            $image = $request->file('image'); 
            $path = Storage::disk('s3')->putFile('users', $image, 'public');
            $user->image_url = Storage::disk('s3')->url($path);
        }
        $user->save();
        return redirect()->route('users.show', $user->name);
    }

    public function likes(string $name){
        $user = User::where('name', $name)->first();
        $posts = $user->likes->sortByDesc('created_at');
        return view('users.likes', compact('user', 'posts'));
    }

    public function follow(Request $request, string $name){
        $user = User::where('name', $name)->first();
        
        if($user->id == $request->user()->id){
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);
        
        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name){
        $user = User::where('name', $name)->first();
        
        if($user->id == $request->user()->id){
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    public function followings(string $name){
        $user = User::where('name', $name)->first();
        $followings = $user->followings->sortByDesc('created_at');
        return view('users.followings', compact('user', 'followings'));
    }

    public function followers(string $name){
        $user = User::where('name', $name)->first();
        $followers = $user->followers->sortByDesc('created_at');
        return view('users.followers', compact('user', 'followers'));
    }
}
