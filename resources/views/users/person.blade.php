<div class="card">
  <div class="card-body">
    <h2 class="card-title">{{ $person->name }}</h2>
    @if(Auth::id() != $person->id)
      <div>
        @if($person->isFollowedBy(Auth::user()))
          <a href="{{ route('users.unfollow', ['name' => $person->name]) }}" class="btn btn-success btn-sm">
            フォロー中
          </a>
        @else
          <a href="{{ route('users.follow', ['name' => $person->name]) }}" class="btn btn-secondary btn-sm">
            フォローする
          </a>
        @endif
      </div>
    @endif
  </div>
</div>