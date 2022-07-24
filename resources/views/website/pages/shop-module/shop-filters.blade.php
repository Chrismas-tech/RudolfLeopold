{{-- <div class="mb-2">
    <button class="w-100 flex-complete shop-toggle btn my-bg-danger my-white" title="Menu categories">
        <i class="fa-solid fa-arrow-right-from-bracket me-1 my-white"></i>
        <span class="ms-2 shop-slide-titles">Menu categories</span>
    </button>
</div> --}}

<div class="shop-filters p-3">
    {{-- <h4 class="w-100 flex-complete btn btn-light filters-slide-toggle" data-mdb-ripple-color="dark" title="Deploy Filters Bar">
        <i class="fa-solid fa-list my-danger"></i>
        <span class="ms-2 shop-slide-titles">Menu Filters</span>
    </h4> --}}

    <div class="shop-filters-slide">
        <form action="{{route('website.shop')}}" method="GET" id="form-filters">
            @csrf
            <!-- CATEGORIES LEFT SIDE -->
            @forelse ($categories_left_side as $category)
            <div class="filters-head text-center">
                <h2>Filters</h2>
            </div>
            <div class="divider"></div>
            <div class="filters-head text-center">
                <h6 class="flex-complete">
                    <span>Category</span>
                    <i class="bi bi-arrow-right-short"></i>
                    <span>{{$category->name}}</span>
                </h6>
            </div>
            <div class="divider"></div>
            @empty

            @endforelse

            <!-- CATEGORIES LEFT SIDE -->

            <!-- PRICE RANGE -->
            <div class="row">
                <div class="col-12">
                    <div class="filters-head">Price Range</div>
                    <div class="row my-price-range mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="number" min="0" name="min_price" class="form-control" placeholder="From" value="{{ Request::get('min_price') ? Request::get('min_price') : '' }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group d-flex">
                                <input type="number" name="max_price" class="form-control" placeholder="To" value="{{ Request::get('max_price') ? Request::get('max_price') : '' }}">
                                <div class="flex-complete symbol-price">
                                    <strong>€</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="filters-head">Sort by</div>
                    <div class="flex-complete my-price-range mb-3">
                        <select name="filter_price" id="filter_price" class="form-select w-100 p-0 pl-2">
                            <option {{ Request::get('filter_price') == 'asc' ? 'selected' : '' }} value="asc">Lowest Price</option>
                            <option {{ Request::get('filter_price')  == 'desc' ? 'selected' : '' }} value="desc">Highest Price
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="filters-head">Results per page</div>
                    <div class="flex-complete my-price-range">
                        <select name="filter_nb_result" id="filter_nb_result" class="form-select w-100 p-0 pl-2">
                            {{-- <option {{ Request::get('filter_nb_result')  == '5' ? 'selected' : '' }} value="5">5
                            </option>
                            <option {{ Request::get('filter_nb_result')  == '10' ? 'selected' : '' }} value="10">10
                            </option> --}}
                            <option {{ Request::get('filter_nb_result')  == '20' ? 'selected' : '' }} value="20">20
                            </option>
                            <option {{ Request::get('filter_nb_result')  == '50' ? 'selected' : '' }} value="50">50
                            </option>
                            <option {{ Request::get('filter_nb_result')  == '100' ? 'selected' : '' }} value="100">100
                            </option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 mt-3">
                                <div class="filters-head">Brands</div>
                                <ul class="d-flex flex-wrap align-items-center">
                                    <li class="checkbox-li">
                                        <input id="apple" type="checkbox" @if(isset($_GET['brand'])) {{in_array('apple',$_GET['brand'])  ? 'checked' : '' }} @endif value="apple" name="brand[]">
                                        <label for="apple">Apple<span></span>
                                        </label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="asus" type="checkbox" @if(isset($_GET['brand'])) {{in_array('asus',$_GET['brand'])  ? 'checked' : '' }} @endif value="asus" name="brand[]">
                                        <label for="asus">Asus<span></span>
                                        </label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="gionee" type="checkbox" @if(isset($_GET['brand'])) {{in_array('gionee',$_GET['brand'])  ? 'checked' : '' }} @endif value="gionee" name="brand[]">
                                        <label for="gionee">Gionee<span></span>
                                        </label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="micromax" type="checkbox" @if(isset($_GET['brand'])) {{in_array('micromax',$_GET['brand'])  ? 'checked' : '' }} @endif value="micromax" name="brand[]">
                                        <label for="micromax">Micromax<span></span>
                                        </label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="samsung" type="checkbox" @if(isset($_GET['brand'])) {{in_array('samsung',$_GET['brand'])  ? 'checked' : '' }} @endif value="samsung" name="brand[]">
                                        <label for="samsung">Samsung<span></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <div class="filters-head">Color</div>
                                <ul class="d-flex flex-wrap align-items-center">
                                    <li class="checkbox-li">
                                        <input id="black" type="checkbox" @if(isset($_GET['color'])) {{in_array('black',$_GET['color'])  ? 'checked' : '' }} @endif value="black" name="color[]">
                                        <label for="black">Black</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="orange" type="checkbox" @if(isset($_GET['color'])) {{in_array('orange',$_GET['color'])  ? 'checked' : '' }} @endif value="orange" name="color[]">
                                        <label for="orange">Orange</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="red" type="checkbox" @if(isset($_GET['color'])) {{in_array('red',$_GET['color'])  ? 'checked' : '' }} @endif value="red" name="color[]">
                                        <label for="red">Red</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="gold" type="checkbox" @if(isset($_GET['color'])) {{in_array('gold',$_GET['color'])  ? 'checked' : '' }} @endif value="gold" name="color[]">
                                        <label for="gold">Gold</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="green" type="checkbox" @if(isset($_GET['color'])) {{in_array('green',$_GET['color'])  ? 'checked' : '' }} @endif value="green" name="color[]">
                                        <label for="green">Green</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="rose" type="checkbox" @if(isset($_GET['color'])) {{in_array('rose',$_GET['color'])  ? 'checked' : '' }} @endif value="rose" name="color[]">
                                        <label for="rose">Rose</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="white" type="checkbox" @if(isset($_GET['color'])) {{in_array('white',$_GET['color'])  ? 'checked' : '' }} @endif value="white" name="color[]">
                                        <label for="white">White</label>
                                    </li>
                                    <li class="checkbox-li">
                                        <input id="blue" type="checkbox" @if(isset($_GET['color'])) {{in_array('blue',$_GET['color'])  ? 'checked' : '' }} @endif value="blue" name="color[]">
                                        <label for="blue">Blue</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRICE RANGE -->

                <!-- INPUT HIDDEN VALUE -->
                <input type="hidden" id="shop_search_product" name="shop_search_product" value="{{Request::get('shop_search_product') ?? Request::get('shop_search_product')}}">

                <input type="hidden" id="shop_search_category" name="shop_search_category" value="{{Request::get('shop_search_category') ?? Request::get('shop_search_category')}}">

                <input type="hidden" id="direct_search_product_or_cat_name" name="direct_search_product_or_cat_name" value="{{Request::get('direct_search_product_or_cat_name') ?? Request::get('direct_search_product_or_cat_name')}}">

                <input type="hidden" name="cat_id" value="{{Request::get('cat_id') ?? Request::get('cat_id')}}">
                <!-- INPUT HIDDEN VALUE -->

                <div class="flex-complete mt-4 mb-4">
                    <button type="submit" class="btn btn-sm btn-danger">
                        <span>Apply Filters</span>
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
