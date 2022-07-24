@extends('website.layouts.base-website')
@section('title')
Accueil
@endsection
@section('content')
@include('website.layouts.jumbotron')
{{-- @include('website.pages.shop-module') --}}

<!-- Start category Area -->
<section class="category-area mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{asset('img/img-template/category/c1.jpg')}}" alt="">
                            <a href="{{asset('img/img-template/category/c1.jpg')}}" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{asset('img/img-template/category/c2.jpg')}}" alt="">
                            <a href="{{asset('img/img-template/category/c2.jpg')}}" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{asset('img/img-template/category/c3.jpg')}}" alt="">
                            <a href="{{asset('img/img-template/category/c3.jpg')}}" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Product for Couple</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="img-fluid w-100" src="{{asset('img/img-template/category/c4.jpg')}}" alt="">
                            <a href="{{asset('img/img-template/category/c4.jpg')}}" class="img-pop-up" target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">Sneaker for Sports</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="{{asset('img/img-template/category/c5.jpg')}}" alt="">
                    <a href="{{asset('img/img-template/category/c5.jpg')}}" class="img-pop-up" target="_blank">
                        <div class="deal-details">
                            <h6 class="deal-title">Sneaker for Sports</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">

    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Hot Deals</h1>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore
                            magna aliqua.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($featured_product as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-product">
                        <a href="{{route('website.product.details', [$product->id, $product->slug])}}">
                            <img class="img-fluid" src="{{asset($product->main_image_path)}}" alt="">
                        </a>
                        <div class="product-details mt-4">
                            <h6>{{$product->name}}</h6>
                            <div class="price">
                                <h6>{{PriceHelpers::selling_price($product->selling_price)}} Є</h6>
                                @if($product->discount_percent)
                                <h6 class="l-through">{{PriceHelpers::selling_price($product->price)}} Є</h6>
                                @endif
                            </div>

                            <div class="prd-bottom">
                                <a href="" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                {{-- <a href="" class="social-info">
                                    <span class="lnr lnr-sync"></span>
                                    <p class="hover-text">compare</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single product -->
                @empty
                No products in this section yet
                @endforelse
            </div>
        </div>
    </div>

    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Special Offer</h1>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore
                            magna aliqua.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($special_offer_product as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-product">
                        <a href="{{route('website.product.details', [$product->id, $product->slug])}}">
                            <img class="img-fluid" src="{{asset($product->main_image_path)}}" alt="">
                        </a>
                        <div class="product-details mt-4">
                            <h6>{{$product->name}}</h6>
                            <div class="price">
                                <h6>{{PriceHelpers::selling_price($product->selling_price)}} Є</h6>
                                @if($product->discount_percent)
                                <h6 class="l-through">{{PriceHelpers::selling_price_after_discount($product->discount_percent, $product->selling_price)}} Є</h6>
                                @endif
                            </div>

                            <div class="prd-bottom">

                                <a href="" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Wishlist</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-sync"></span>
                                    <p class="hover-text">compare</p>
                                </a>
                                <a href="" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single product -->
                @empty
                No products in this section yet
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->


<!-- Start brand Area -->
{{-- <section class="brand-area section_gap">
    <div class="container">
        <div class="row">
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="{{asset('img/img-template/brand/1.png')}}" alt="">
</a>
<a class="col single-img" href="#">
    <img class="img-fluid d-block mx-auto" src="{{asset('img/img-template/brand/2.png')}}" alt="">
</a>
<a class="col single-img" href="#">
    <img class="img-fluid d-block mx-auto" src="{{asset('img/img-template/brand/3.png')}}" alt="">
</a>
<a class="col single-img" href="#">
    <img class="img-fluid d-block mx-auto" src="{{asset('img/img-template/brand/4.png')}}" alt="">
</a>
<a class="col single-img" href="#">
    <img class="img-fluid d-block mx-auto" src="{{asset('img/img-template/brand/5.png')}}" alt="">
</a>
</div>
</div>
</section> --}}
<!-- End brand Area -->

<!-- Start related-product Area -->

<!-- End related-product Area -->
@endsection
