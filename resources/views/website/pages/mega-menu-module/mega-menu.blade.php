<div class="mega-menu">
    <div class="mega-menu-tabs">
        @forelse ($categories_nested as $main_category)
        <button id="mega-menu-tabs-links_{{$main_category->id}}">
            @if($main_category->category_icon)
            {!! $main_category->category_icon !!}
            @endif
            {{$main_category->name}}
        </button>
        @empty
        @endforelse
    </div>

    <div class="mega-menu-tabs-content d-none">
        @forelse ($categories_nested as $category)
        <div class="row d-none mega-menu-content-rows" id="mega-menu-content-rows-{{$category->id}}">
            <div class="col-8">
                <div class="row">
                    @forelse($category->children as $subcategory)
                    <div class="col-4 mb-4">
                        <h6>{{$subcategory->name}}</h6>
                        <ul class="mt-2">
                            @forelse($subcategory->children as $subcategory)
                            <li>
                                <a href="{{route('website.shop', ['category_search' => $subcategory->name])}}" class="mega-menu-category">{{$subcategory->name}}</a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-4">
                @if($category->file_path_mega_menu)
                <img class="img-fluid" src="{{asset($category->file_path_mega_menu)}}" alt="">
                @endif
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
