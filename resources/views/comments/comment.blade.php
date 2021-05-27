<div class="media my-5">
  <a href="#" class="mr-3">
    <img src="" alt="メディアの画像">
  </a>
  <div class="media-body">
    <h5 class="mt-0">{{ $comment->user->name }}</h5>
    {{ $comment->comment }}
  </div>
  @if(Auth::id() == $comment->user_id)
    <div class="btn-group">
      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        menu
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('comments.edit', ['post' => $post, 'comment' => $comment]) }}">編集</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#delete-modal{{ $comment->id }}">削除</a>
      </div>

      <div class="modal fade" id="delete-modal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{ route('comments.destroy', ['post' => $post, 'comment' => $comment]) }}">
              @method('DELETE')
              @csrf
              <div class="modal-body">
                  <label>コメントを削除しますか？</label>
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
