@extends('website.layouts.base-website')
@section('title')
Register
@endsection
@section('subtitle')
Register
@endsection
@section('content')

@include('website.layouts.banner')

<!--================REGISTER =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="login_form_inner flex-complete">
                    <div>
                        <h2 class="my-h2">Sign in with social medias</h2>
                        <div class="col-md-12 col-sm-12 sign-in">
                            <div>

                                <div class="d-flex justify-content-center facebook-sign-in">
                                    <div>
                                        <a href="#" class="w-100">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <span class="ml-1">Sign In with Facebook</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center google-sign-in  mt-3">
                                    <div>
                                        <a href="#" class="w-100">
                                            <i class="fab fa-google"></i>
                                        </a>
                                        <span class="ml-1">Sign In with Facebook</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center twitter-sign-in mt-3">
                                    <div>
                                        <a href="#" class="w-100">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <span class="ml-1">Sign In with Facebook</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 mt-4 mt-lg-0">
                <div class="login_form_inner">
                    <h2 class="my-h2">Create an account</h2>
                    <form method="POST" class="row login_form" action="{{ route('register') }}">
                        @csrf

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('name') my-is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')}}">

                            @error('name')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control @error('email') my-is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('address') my-is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{old('address')}}">
                            @error('address')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('city') my-is-invalid @enderror" id="city" name="city" placeholder="City" value="{{old('city')}}">
                            @error('city')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="number" class="form-control @error('postal_code') my-is-invalid @enderror" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{old('postal_code')}}">
                            @error('postal_code')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('phone') my-is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                            @error('phone')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password') my-is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password_confirmation') my-is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                            @error('password_confirmation')
                            <span class="text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group mt-4">
                            <button type="submit" value="submit" class="btn my-bg-danger my-white">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================REGISTER =================-->
@endsection
