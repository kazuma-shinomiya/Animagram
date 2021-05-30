@extends('layouts.app')

@section('content')
  <div class="col-lg-9">
    @include('users.user')
    @include('users.tabs', ['hasPosts' => false, 'hasLikes' => true])
    <div class="row">
      @foreach($posts as $post)
        <div class="col-lg-6">
          @include('posts.post')
        </div>
      @endforeach
    </div>
  </div>
@endsection
