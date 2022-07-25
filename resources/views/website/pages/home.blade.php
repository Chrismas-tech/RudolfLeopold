@extends('website.layouts.base-website')
@section('title')
Home
@endsection
@section('content')
@include('website.layouts.header')
@include('website.layouts.jumbotron')


@include('website.pages.biography')

@if($ytb_videos)
@include('website.pages.section-videos-gallery')
@endif

@if($photos_gallery)
@include('website.pages.section-photos-gallery')
@endif

@if($tracks)
@include('website.pages.section-tracks')
@endif

@include('website.pages.contact')

@endsection
