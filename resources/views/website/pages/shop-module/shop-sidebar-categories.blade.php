<div class="shop-sidebar-categories">
    <ul id="UL-NESTED-MAIN">
        <div class="sidebar-categories-head">
            <span>Categories</span>
            <i class="fa-solid fa-circle-xmark ms-3"></i>
        </div>
        @forelse($categories_nested as $category)
        <li class="li-nested li-nested-main">
            <div class="flex-complete">
                <a class="a-nested btn
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
                @include('website.pages.navigation-module.tree-menu-side-nested',
                [
                'categories' => $category->children,
                ])
            </ul>
            @endif
        </li>
        @empty
        There is no category yet
        @endforelse
    </ul>
</div>
