<ul class="nav justify-content-center">
  @foreach($categories as $category)
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">{{$category->category}}</a>
  </li>
  @endforeach
</ul>