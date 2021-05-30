@extends('layouts.app')

@section('content')
  <div class="col-lg-9">
    <div class="row">
      @foreach($posts as $post)
        <div class="col-lg-4">
          @include('posts.post')
        </div>
      @endforeach
      <div class="mx-auto mt-4">
        {{ $posts->appends(request()->input())->links() }}
      </div>
    </div>
  </div>
@endsection
