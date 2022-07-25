@extends('website.layouts.base-website')
@section('title')
Video Gallery
@endsection
@section('content')
@if($ytb_videos)
<div class="flex-complete mt-50 oneMusic-buttons-area">
    <a href="{{route('website.home')}}" class="btn oneMusic-btn btn-2 m-2">
        Return to the Home Page
        <i class="fa fa-angle-double-right"></i>
    </a>
</div>
@include('website.pages.videos-gallery')
<div class="flex-complete mt-50 oneMusic-buttons-area">
    <a href="{{route('website.home')}}" class="btn oneMusic-btn btn-2 m-2">
        Return to the Home Page
        <i class="fa fa-angle-double-right"></i>
    </a>
</div>
@endif
@endsection
