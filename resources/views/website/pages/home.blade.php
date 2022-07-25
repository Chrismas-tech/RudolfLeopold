@extends('website.layouts.base-website')
@section('title')
Home
@endsection
@section('content')
@include('website.layouts.jumbotron')

@include('website.pages.biography')

@if($ytb_videos)
@include('website.pages.videos-gallery')
@endif

@if($photos_gallery)
@include('website.pages.photos-gallery')
@endif

@if($tracks)
@include('website.pages.tracks')
@endif

@include('website.pages.contact')

@endsection
