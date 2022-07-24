@forelse ($category->children as $category)
<li class="li-nested">
    <div class="flex-complete">
        <a class="div-nested btn
        {{in_array($category->id, $collect_parent_ids) ? 'nested-active' : ''}}" id="{{$category->id}}">
            <div>
                {{$category->name}}
            </div>
            <div>
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </a>
    </div>

    @if($category->children)
    <ul class="ul-nested">
        <div class="sidebar-categories-head">
            <div>
                <span class="ul-nested-category-name">{{$category->name}}</span>
            </div>
            <div>
                <span class="see-all" id="{{$category->id}}">See all</span>
                {{-- <i class="fa-solid fa-angle-right my-white"></i> --}}
            </div>
        </div>
        @include('website.pages.navigation-module.tree-menu-side-nested', ['categories' => $category->children])
    </ul>
    @endif
</li>
@empty
<li>
    <a class="btn see-category-last {{in_array($category->id, $collect_parent_ids) ? 'nested-active' : ''}}" id="{{$category->id}}">
        @if(Helpers::nb_products_of_category($category->id))
        <span>
            <i class="fa-solid fa-box me-3"></i>
        </span>
        <span class="see-category-name-last me-1" id="{{$category->id}}">
            {{$category->name}}
        </span>
        <span>
            {{Helpers::nb_products_of_category($category->id)}} result(s)
        </span>
        @else
        <span>
            No products here yet...
        </span>
        @endif
    </a>
</li>
@endforelse
