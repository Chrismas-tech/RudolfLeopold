<span class="ms-3 pointer">
    <i class="fa-solid fa-square-plus" title="Add a Category/Subcategory" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#add-category" id="{{$category->id}}"></i>
</span>

<span class="ms-2 me-2">
    @if($category->parent == null)
    <a href="{{route('category.edit', $category->id)}}" title="Edit the Category/Subcategory" aria-hidden="true" style="color: #8a99b5;!important">
        <i class="fa-solid fa-square-pen"></i>
    </a>
    @else
    <i class="fa-solid fa-square-pen" title="Edit a Category/Subcategory" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#edit-category" id="{{$category->id}}"></i>
    @endif
</span>

<span>
    <a href="{{route('category.delete', $category->id)}}" title="Delete the Category/Subcategory" class="delete_category_{{$category->id}}" style="color: #8a99b5;!important">
        <i class="fa fa-trash"></i>
    </a>
</span>
