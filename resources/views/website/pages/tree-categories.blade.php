<ul class="links">
    @foreach ($categories as $category)
    <li><a href="#">{{$category->name}}</a></li>
    @endforeach
    @if (count($category->children))
    @include('website.pages.tree-categories', ['categories' => $category->children ])
    @endif
</ul>
