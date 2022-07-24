{{-- <h1>{{$category->id}}</h1> --}}

<ul class="nested" @if(in_array($category->id,$collect_parent_ids)) style="display:block;!important" @endif>
    @foreach($categories as $category)
    <li>
        @if (count($category->children))
        <i class="fa fa-fw 
        @if(in_array($category->id,$collect_parent_ids))
            fa-chevron-circle-down
            @else
            fa-chevron-circle-right 
            @endif" title="Expand this Category/Subcategory">
        </i>
        @else

        <i class="fa-solid fa-box"></i>
        @endif

        <span class="edit_name_category_{{$category->id}}">{{$category->name}}</span> -- N°{{$category->id}}

        @if($category->parent_id == null)
        <span class=" badge badge-success">Main Category</span>
        @endif
        @include('admin.pages.categories.category-add-edit-delete-buttons')

        <!-- CALL SAME RESURSIVE FILE -->
        @if ($category->children)
        @include('admin.pages.categories.tree-categories', ['categories' => $category->children])
        @endif
    </li>
    @endforeach
</ul>
