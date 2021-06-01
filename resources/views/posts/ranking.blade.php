@extends('layouts.app')

@section('content')
  <div class="col-lg-9">
    <div class="row">
      @foreach($posts_ranking as $post)
        <div class="col-lg-4">
          <div>{{ $loop->iteration }}位</div>
          @include('posts.post')
        </div>
      @endforeach
    </div>
  </div>
@endsection