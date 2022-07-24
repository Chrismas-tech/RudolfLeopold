@extends('website.layouts.base-website')
@section('title')
Shop
@endsection
@section('content')

<!-- SHOP SIDEBAR CATEGORIES HIDDEN -->
{{-- @include('website.pages.shop-module.shop-sidebar-categories') --}}
<!-- SHOP SIDEBAR CATEGORIES HIDDEN -->

<!-- BANNER -->
@include('website.layouts.banner')
<!-- BANNER -->

<!-- SHOP -->
<div class="shop-container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 col-lg-3 div-shop-filters">
            @include('website.pages.shop-module.shop-filters')
        </div>
        <div class="col-md-12 col-lg-9 div-shop-products-list mt-3 mt-md-0">
            @include('website.pages.shop-module.shop-products-list')
        </div>
    </div>
</div>
<!-- SHOP -->
@endsection
