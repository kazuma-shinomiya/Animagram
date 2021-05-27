@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('layouts.sideMenu')
      <div class="col-lg-9">
        <div class="card">
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
    </div>
  </div>
@endsection