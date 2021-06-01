@extends('layouts.app')

@section('content')
  <div class="col-lg-5">
    @include('posts.post')
  </div>
  <div class="col-lg-4">
    @include('comments.index')
  </div>
@endsection