@extends('layouts.app')

@section('content')
  <div class="col-lg-5">
    @include('posts.post')
  </div>
  <div class="col-lg-4">
    <div class="card mt-4">
      <div class="card-body">
        <form method="POST" action="{{ route('comments.update', ['post' => $post, 'comment' => $comment]) }}">
          @method('PUT')
          @include('comments.form')
        </form>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-body">
        @foreach($comments as $comment)
          @include('comments.comment')
        @endforeach
      </div>
    </div>
  </div>
@endsection
