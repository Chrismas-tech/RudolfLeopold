@extends('website.layouts.base-website')
@section('title')
Page not found
@endsection
@section('subtitle')
Page not found
@endsection
@section('content')

{{-- @include('website.layouts.banner') --}}
<div class="error-container flex-complete">
    <div>
        <h1>404</h1>
        <p>We are sorry, the page you've requested is not available...</p>
        <a href="{{route('website.home')}}" class="btn btn-danger my-white">Go To Homepage</a>
    </div>
</div>
@endsection
