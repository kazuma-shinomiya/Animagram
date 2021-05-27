@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    @include('layouts.sideMenu')
    <div class="col-lg-9">
      @include('users.user')
      @include('users.tabs', ['hasPosts' => false, 'hasLikes' => false])
      <h2>フォロワー一覧</h2>
      @foreach($followers as $person)
        @include('users.person')
      @endforeach
    </div>
  </div>
</div>

@endsection