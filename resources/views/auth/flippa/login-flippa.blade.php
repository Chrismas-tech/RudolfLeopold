@extends('website.layouts.base-website')
@section('title')
Login
@endsection
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{route('website.home')}}">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="body-content">
    <div class="container">

        <div class="sign-in-page">

            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-12 col-sm-12 sign-in">
                    <h2 class="heading-title">Sign in</h2>
                    <div class="social-sign-in outer-top-xs d-flex justify-content-center">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="google-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="register-form outer-top-xs" role="form">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" class="form-control unicase-form-control text-input" name="email" value="{{old('email')}}" {{-- required --}} autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" id="password" class="form-control unicase-form-control text-input" type="password" name="password" {{-- required --}} autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="radio mt-2 mb-2">
                            <input type="checkbox" name="optionsRadios" id="remember_me" value="option2">
                            <span class="ml-1">{{ __('Remember me') }}
                                @if (Route::has('password.request'))
                                <a class="btn btn-primary pull-right btn-upper" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>
                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

        @include('website.layouts.brands')
    </div><!-- /.container -->
</div>
@endsection
