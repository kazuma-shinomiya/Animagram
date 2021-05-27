<div class="card">
  <div class="card-body">
    <h2 class="card-title">{{ $user->name }}</h2>
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