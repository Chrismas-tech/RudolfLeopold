<div class="products-shop">
    <h2 class="m-0 p-0"><i class="fa-solid fa-bag-shopping my-danger"></i> Our Shop</h2>
    <!-- Start Best Seller -->
    @include('website.pages.shop-module.hierarchy')
    <div class="nb_results_shop flex-complete mt-3 mb-3">
        @if($display_nb_results[0] == 'results')
        {{$display_nb_results[1]}} result(s) for your search
        {{Request::get('search_bar') ? '« '. Request::get('search_bar').' »' : ''}}
        @elseif ($display_nb_results[0] == 'all')
        {{-- All products in our store --}}
        @endif
    </div>
    @include('website.pages.shop-module.pagination')
    <div class="row products-list">
        @forelse ($all_products as $product)
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
            <div>
                <a href="{{route('website.product.details', [$product->id, $product->slug])}}">
                    <img class="img-fluid" src="{{asset($product->file_path)}}" alt="">
                </a>

                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="{{route('website.product.details', [$product->id, $product->slug])}}">
                            <div class="product-infos  mt-2">
                                <div>
                                    <p class="mb-0 product-category">{{$product->category_name}}</p>
                                    <p class="mb-0 product-name">{{$product->name}}</p>
                                </div>

                                <div class="d-flex justify-content-end">
                                    @if($product->discount_percent > 0)
                                    <div>
                                        <h6 class="price">{{PriceHelpers::selling_price_after_discount($product->discount_percent, $product->selling_price)}} Є</h6>
                                        <h6 class="price-crossed-out my-secondary ms-2">{{PriceHelpers::selling_price($product->selling_price)}} Є</h6>
                                    </div>
                                    @else
                                    <div>
                                        <h6 class="price">{{PriceHelpers::selling_price($product->selling_price)}} Є</h6>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="my-bg-white text-center no-results-found">
            <div class="mb-3">
                <h4 class="btn btn-sm btn-light reinitialize-filters">
                    <i class="fa-solid fa-rotate-left my-danger"></i>
                    Reinitialize filters
                </h4>
            </div>
            <div>
                <h4 class="btn btn-sm my-bg-danger my-white">
                    <i class="fa-solid fa-arrow-right-from-bracket me-1 my-white"></i>
                    Click here and browse our categories
                </h4>
            </div>
        </div>
        @endforelse
    </div>
    @include('website.pages.shop-module.pagination')
    <!-- Start Best Seller -->
</div>
