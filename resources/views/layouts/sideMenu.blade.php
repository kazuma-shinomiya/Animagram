<div class="col-lg-3 sidebar">
  <nav class="navbar navbar-light bg-white border-bottom ">
    <a class="navbar-brand" href="{{ route('posts.ranking') }}">
      <i class="fas fa-crown m-3"></i>ランキング
    </a>
  </nav>
  @foreach($categories as $category)
    <nav class="navbar navbar-light bg-white border-bottom ">
      <a class="navbar-brand" href="{{ route('posts.index', ['category' => $category]) }}">
        <i class="far fa-folder m-3"></i>{{ $category->name }}
      </a>
    </nav>
  @endforeach
</div>