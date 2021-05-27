@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('layouts.sideMenu')
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
              @include('posts.form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection