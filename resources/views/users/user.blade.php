<div class="card">
  <div class="card-body">
    <div class="row justify-content-between">
      <div class="col-4">
        @if($user->image_url == null)
          <i class="far fa-user-circle fa-3x"></i>
        @else
          <img src="{{ $user->image_url }}"　class="rounded-circle" width="100px" height="100px">
        @endif
        <span　class="display-4">{{ $user->name }}</span>
      </div>
      <div class="col-4 text-right">
        @if(Auth::id() == $user->id)
          <div class="btn-group">
            <i type="button" class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('users.edit', ['name' => $user->name]) }}">編集</a>
            </div>
          </div>
        @endif
      </div>
    </div>
    
    <div class="card-text">
      <a href="{{ route('users.followings', ['name' => $user->name])}}" class="text-muted">
        <span>フォロー数：{{ $user->followings->count() }}</span>
      </a>
      <a href="{{ route('users.followers', ['name' => $user->name])}}" class="text-muted">
        <span>フォロワー数：{{ $user->followers->count() }}</span>
      </a>
    </div>
    
    
    
    @if(Auth::id() != $user->id)
      <div>
        @if($user->isFollowedBy(Auth::user()))
          <a href="{{ route('users.unfollow', ['name' => $user->name]) }}" class="btn btn-success btn-sm">
            フォロー中
          </a>
        @else
          <a href="{{ route('users.follow', ['name' => $user->name]) }}" class="btn btn-secondary btn-sm">
            フォローする
          </a>
        @endif
      </div>
    @endif
  </div>
</div>