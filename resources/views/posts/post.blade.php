<div class="card mt-4">
  <div class="row justify-content-between">
    <div class="col-4">
      <a href="{{ route('users.show', ['name' => $post->user->name])}}" class="text-dark">
        @if($post->user->image_url == null)
          <i class="far fa-user-circle fa-3x m-3"></i>
        @else
          <img src="{{ $post->user->image_url }}"　class="rounded-circle m-3" width="40px" height="40px">
        @endif
        {{ $post->user->name }}
      </a>
    </div>
    <div class="col-4 text-right m-3">
      @if(Auth::id() == $post->user_id)
        <div class="btn-group">
          <i type="button" class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('posts.edit', ['post' => $post]) }}">編集</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#delete-modal{{ $post->id }}">削除</a>
          </div>
    
          <div class="modal fade" id="delete-modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body text-left">
                      <label>データを削除しますか？</label>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                      <button type="submit" class="btn btn-danger">削除</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
  <img src="{{ $post->image_url }}">
  
  <div class="card-body">
    <p>{{ $post->body }}</p>
  </div>
  
  <div class="row justify-content-between">
    <div class="col-4">
      <a href="{{ route('posts.index', ['category' => $post->category]) }}">
        <i class="far fa-folder m-3"></i>{{ $post->category->name }}
      </a>
    </div>
    <div class="col-6 text-right">
      <post-like
        :initial-is-liked-by="@json($post->isLikedBy(Auth::user()))"
        :initial-count-likes="@json($post->likes()->count())"
        :authorized="@json(Auth::check())"
        endpoint="{{ route('posts.like', $post) }}"
      >
      </post-like>
      
      <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn mr-3">
        <i class="far fa-comment"></i>
      </a>
    </div>
  </div>
  
  <div>
    @foreach($post->tags as $tag)
      <a class="text-muted ml-3 mb-4">
        {{ $tag->hashtag }}
      </a>
    @endforeach
  </div>
  
</div>
