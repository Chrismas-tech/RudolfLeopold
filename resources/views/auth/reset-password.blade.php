@extends('website.layouts.base-website')
@section('title')
Reset your password
@endsection
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Reset your password</h1>
                {{-- <nav class="d-flex align-items-center">
                    <a href="{{route('website.home')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                <a href="category.html">Login</a>
                </nav> --}}
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login_form_inner pt-4 pb-4 text-left">
                    <h2 class="text-center">RESET YOUR PASSWORD</h2>
                    <form class="row login_form" method="POST" action="{{ route('password.update') }}" style="max-width: 600px;">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="col-md-12 form-group">
                            <input type="email" id="email" name="email" class="form-control @error('email') my-is-invalid @enderror" placeholder="Email" value="{{old('email', $request->email)}}">
                            @error('email')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" id="password" name="password" class="form-control @error('password') my-is-invalid @enderror" placeholder="Password" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" id="password" name="password_confirmation" class="form-control @error('password_confirmation') my-is-invalid @enderror" placeholder="Password Confirmation" value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group flex-complete">
                            <button type="submit" value="submit" class="my-btn-primary">Reset password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
