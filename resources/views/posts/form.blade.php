
@csrf
<div class="form-group mb-3">
  <label for="post-body" class="form-label">Body</label>
  <textarea class="form-control" id="post-body" rows="3" name="post[body]">{{ $post->body ?? old('post.body') }}</textarea>
  {{ $errors->first('post.body') }}
</div>
<div class="form-group mb-3">
  <label for="post-image" class="form-label">Photo</label>
  <input type="file" class="form-control" id="post-image" name="image">
  {{ $errors->first('image') }}
</div>
<div class="form-group mb-3">
  <post-tags-input
    :initial-tags='@json($tagNames ?? [])'
    :autocomplete-items='@json($allTagNames ?? [])'
  >
  </post-tags-input>
</div>
<div class="form-group mb-3">
  <label for="post-category" class="form-label">Category</label>
  <select id="post-category" class="custom-select form-control" name="post[category_id]">
    @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{$category->name}}</option>
    @endforeach
  </select>
</div>
<input type="submit" class="btn btn-primary" value="保存">
