@csrf
<div class="form-group mb-3">
  <label for="comment-body" class="form-label">Comment</label>
  <textarea class="form-control" id="comment-body" rows="3" name="comment">{{ $old_comment->comment ?? old('comment') }}</textarea>
  {{ $errors->first('comment') }}
</div>
<input type="submit" class="btn btn-primary" value="保存">