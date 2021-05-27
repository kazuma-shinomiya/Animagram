@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('layouts.sideMenu')
      <div class="col-lg-9">
        <div class="row">
          @foreach($posts as $post)
            <div class="col-lg-4">
              @include('posts.post')
            </div>
          @endforeach
        </div>
      </div>
    </div>
    {{ $posts->appends($param)->links() }}
  </div>
@endsection