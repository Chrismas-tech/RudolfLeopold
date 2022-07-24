<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
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
    @include('admin.layouts.aside-second')

    @include('admin.layouts.scripts')
</body>
</html>
