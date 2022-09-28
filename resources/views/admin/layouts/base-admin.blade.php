<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <!-- SEO tools -->
    {!! SEOMeta::generate() !!}
    <!-- SEO tools -->

    <!-- OpenGraph -->
    {!! OpenGraph::generate() !!}
     <!-- OpenGraph -->
    
    <!-- Twitter --->
    {!! Twitter::generate() !!}
    <!-- Twitter --->

    <!-- Meta -->
    
    <link rel="icon" href="{{asset('img/img-admin/logo.png')}}">

    <title>Administration | @yield('subtitle')</title>

    <!-- CSRF -->
    <meta name="_token" content="{{ csrf_token() }}">
    @include('admin.layouts.css')

</head>

<body>
    @include('sweetalert::alert')
    @include('admin.layouts.preloader')

    @include('admin.layouts.header')
    @include('admin.layouts.aside-main')
    @yield('content')
    @include('admin.layouts.footer')
    {{-- @include('admin.layouts.aside-second') --}}

    @include('admin.layouts.scripts')
</body>
</html>
