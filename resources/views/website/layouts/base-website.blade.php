<!DOCTYPE html>
<html lang="en">
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

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('img/img-template/favicon/favicon.png')}}">
    <!-- Favicon icon -->

    <!-- CSRF -->
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- CSRF -->

    <!-- Title-->
    <title>Rudolf Leopold | @yield('title')</title>
    <!-- Title-->

    <!-- CSS -->
    @include('website.layouts.css')
    <!-- CSS -->
</head>

<body>
    @include('sweetalert::alert')
    @include('admin.layouts.preloader')

    <!-- Page -->
    @yield('content')
    @include('website.layouts.footer')
    <!-- Page -->

    <!-- Scripts-->
    @include('website.layouts.scripts')
    <!-- Scripts-->
</body>
</html>
