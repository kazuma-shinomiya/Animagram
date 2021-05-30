<div class="media my-5">
  @if($comment->user->image_url == null)
    <i class="far fa-user-circle fa-3x"></i>
  @else
    <img src="{{ $comment->user->image_url }}"　class="rounded-circle" width="50px" height="50px">
  @endif
  <div class="media-body ml-4">
    <a class="mt-0 h2 text-dark" href="{{ route('users.show', ['name' => $comment->user->name])}}">{{ $comment->user->name }}</a>
    <p>{{ $comment->comment }}</p>
  </div>
  @if(Auth::id() == $comment->user_id)
    <div class="btn-group">
      <i type="button" class="fas fa-ellipsis-v" data-toggle="dropdown"></i>
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
