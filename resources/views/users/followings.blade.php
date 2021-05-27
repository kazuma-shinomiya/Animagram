@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('layouts.sideMenu')
    <div class="col-lg-9">
      @include('users.user')
      @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false])
      <h2>フォロー中</h2>
      @foreach($followings as $person)
        @include('users.person')
      @endforeach
    </div>
  </div>
</div>

@endsection