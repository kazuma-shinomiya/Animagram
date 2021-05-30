@extends('layouts.app')

@section('content')
  
  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('comments.store', ['post' => $post])}}">
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