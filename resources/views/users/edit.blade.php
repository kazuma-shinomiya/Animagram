@extends('layouts.app')

@section('content')
  
<div class="col-lg-9">
  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
          <label for="name" class="form-label">Name</label>
          <input class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
          {{ $errors->first('name') }}
        </div>
        <div class="form-group mb-3">
          <label for="image" class="form-label">Photo</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <input type="submit" class="btn btn-primary" value="保存">
      </form>
    </div>
  </div>
</div>
   
@endsection