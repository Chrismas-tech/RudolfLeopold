@extends('website.layouts.base-website')
@section('content')
@section('title')
Product Details
@endsection
@section('subtitle')
Product Details
@endsection

@include('website.layouts.banner')

<div class="product-details-container mt-5">
    <div class="row">
        <div class="col-5">
            @if($product->variant)
            <div class="zoom-product-details">
                <img class="product-details-main-img" src="{{asset('img/img-template/loading.webp')}}" data-zoom={{asset('img/img-template/loading.webp')}} alt="">
            </div>

            <div class="product-details-previews-imgs mt-2 d-flex flex-wrap">
            </div>
            @else
            <div class="zoom-product-details">
                <img class="product-details-main-img" src="{{asset($product->file_path)}}" data-zoom={{asset($product->file_path)}} alt="">
            </div>

            <div class="product-details-previews-imgs mt-2 d-flex flex-wrap">
                @forelse ($multiple_image_simple_product as $img)
                <div class="me-1 mb-1">
                    <img class="product-details-preview-img" src="{{asset($img->file_path)}}" data-zoom={{asset($img->file_path)}} alt="">
                </div>
                @empty

                @endforelse
            </div>
            @endif
        </div>

        <div class="col-7">
            <div class="d-flex align-items-center">
                <h3>{{$product->name}}</h3>
                <span class="ms-1 fst-italic"> - {{$product->category_name}}</span>
            </div>

            <div class="product-main-infos">

                <div class="d-flex align-items-center justify-content-between">
                    <div id="product-stock">
                        @if($product->qty > 0)
                        <span class="me-1 btn btn-sm my-bg-success my-white">
                            <i class="fa-solid fa-circle-check"></i>
                            In Stock <span id="product-qty">({{$product->qty}})</span>
                        </span>
                        @else
                        <span class="me-1 btn btn-sm my-bg-danger my-white">
                            <i class="fa-solid fa-circle-xmark"></i>
                            Out of Stock
                        </span>
                        @endif
                    </div>

                    <span id="variant-available" class="me-1 mt-2 d-none btn btn-sm my-bg-danger my-white">
                        <i class="fa-solid fa-circle-xmark"></i>
                        Out of stock !
                    </span>

                    <div id="product-price">
                        <h3 class="price"><span id="selling_price">{{PriceHelpers::selling_price($product->selling_price)}}</span> €
                        </h3>
                    </div>
                </div>

                <div class="divider"></div>

                @forelse ($product_options_values as $key => $item)
                <label class="fst-italic">{{ucfirst($key)}}</label>
                <div class="d-flex flex-wrap product-options-radio">
                    {{-- @php
                    $rand = rand(0, count(json_decode($item)) -1);
                    @endphp --}}

                    @forelse (json_decode($item) as $property_key => $value)

                    <div class="form-check mb-2 mt-2">
                        <input type="radio" @if ($property_key==0) checked @endif class="btn-check" name="{{$key}}" id="{{$value}}" autocomplete="off">
                        <label class="label-active" for="{{$value}}">{{ucfirst($value)}}</label>
                    </div>
                    @empty
                    @endforelse
                </div>
                <div class="divider"></div>
                @empty
                @endforelse


                <div>
                    <label class="fst-italic">Description</label>
                    <p>{!! $product->short_description !!}</p>
                </div>

                <div class="mt-3 d-flex align-items-center">
                    <form {{-- action="{{route('cart.store')}}" --}} method="POST" {{-- enctype="multipart/form-data" --}}>
                        @csrf

                        @if((Session::get('form_1')))
                        <div class="mb-4">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger p-2" role="alert">
                                <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                            </div>
                            @endforeach
                        </div>
                        @endif


                        <div class="fst-italic mt-2">
                            <div class="form-group d-flex align-items-center">
                                <label class="me-2" for="qty">Quantity</label>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <i class="bi bi-file-minus"></i>
                                    </div>
                                    <div>
                                        <input class="form-control mx-2 input-qty-css" id="product_details_qty" type="number" name="product_details_qty" step="1" value="1">
                                    </div>
                                    <div>
                                        <i class="bi bi-plus-square"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- INPUT HIDDEN -->
                            <input type="hidden" name="variant_id" id="variant_id" value="">
                            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                            <!-- INPUT HIDDEN -->

                            <div class="mt-2">
                                <button type="submit" id="add-to-cart" class="btn btn-sm my-bg-danger my-white">Add to cart</button>
                                <a href="" class="ms-3">
                                    <i class="fa-solid fa-heart-circle-plus my-danger"></i>
                                    Add to Wish List
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="mt-5 mb-5 product-description">
            <ul class="nav nav-tabs flex-complete" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Reviews
                    </button>
                </li>
            </ul>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {!! $product->long_description !!}
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="review_box">
                            <form class="login_form mt-3 mb-5" action="{{route('review.add', $product->id)}}" method="POST" id="form-review">
                                @csrf

                                @if((Session::get('form_2')))
                                <div class="mb-4">
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger p-2" role="alert">
                                        <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                    </div>
                                    @endforeach
                                </div>
                                @endif


                                <div class="row">

                                    <div class="col-3">
                                        <h4>Your Rating:</h4>
                                        <ul class="rating-stars {{ $errors->has('rating') ? 'my-is-invalid' : ''}}">
                                            <li>
                                                <input type="radio" class="form-check-input" id="5-star" name="rating" value="5">
                                                <label for="5-star">
                                                    @for($i=0; $i <= 4; $i++) <i class="fa fa-star"></i>
                                                        @endfor
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" class="form-check-input" id="4-star" name="rating" value="4">
                                                <label for="4-star">
                                                    @for($i=0; $i <= 3; $i++) <i class="fa fa-star"></i>
                                                        @endfor
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" class="form-check-input" id="3-star" name="rating" value="3">
                                                <label for="3-star">
                                                    @for($i=0; $i <= 2; $i++) <i class="fa fa-star"></i>
                                                        @endfor
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" class="form-check-input" id="2-star" name="rating" value="2">
                                                <label for="2-star">
                                                    @for($i=0; $i <= 1; $i++) <i class="fa fa-star"></i>
                                                        @endfor
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" class="form-check-input" id="1-star" name="rating" value="1">
                                                <label for="1-star">
                                                    <i class="fa fa-star"></i>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-9">
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="message">Your Review</label>
                                                <textarea class="form-control {{ $errors->has('message') ? 'my-is-invalid' : ''}}" class="form-control" name="message" id="message" rows="4" placeholder="Write us something"></textarea>
                                            </div>
                                        </div>
                                        <div class="flex-complete mt-3">
                                            <button type="submit" value="submit" class="btn my-bg-danger my-white">Send</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="box_reviews_title mb-3">
                            @if($product_review_rating)
                            <h5>{{count($reviews)}} Reviews - {{$product_review_rating}}/5</h5>
                            <i class="fa fa-star"></i>
                            @endif
                        </div>
                        <div class="review-list">
                            @include('website.pages.shop-module.reviews-pagination')

                            @forelse($reviews as $review)
                            @if($review->status == 1)
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                @if($review->user->profile_photo_path)
                                                <img class="img-review" src="{{route('user.profile.photo.serve', $review->product_id)}}" alt="">
                                                @else
                                                <img class="img-review" src="{{asset('img/img-template/profile-photo/no_image.jpg')}}" alt="">
                                                @endif
                                            </div>
                                            <div class="ms-2 me-2">
                                                <h6>{{$review->username}}</h6>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                @for($i=0; $i < $review->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                            </div>
                                        </div>
                                        <div class="review-date">
                                            <span>{{$review->created_at->format('jS F Y - h:i')}}</span>
                                        </div>
                                    </div>
                                    <p class="card-text">{{$review->review}}</p>
                                </div>
                            </div>
                            @endif
                            @empty
                            <h5>There are no reviews for this product yet..</h5>
                            @endforelse

                            @include('website.pages.shop-module.reviews-pagination')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

</div>

<!-- End related-product Area -->
@endsection
