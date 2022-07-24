@extends('website.layouts.base-website')
@section('title')
Login
@endsection
@section('subtitle')
Login
@endsection
@section('content')

@include('website.layouts.banner')

<!--================LOGIN=================-->
<section class="login_box_area mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_form_inner p-0">
                    <div class="flex-complete h-100">
                        <div class="text-center">
                            <h2 class="my-h2">Not a member yet ?</h2>
                            <a class="btn my-bg-danger my-white" href="{{route('register')}}">Register Here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="login_form_inner p-0">
                    <h2 class="my-h2 text-center">Log in</h2>
                    <form class="row login_form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('email') my-is-invalid @enderror" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password') my-is-invalid @enderror" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="creat_account d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="checkbox" checked name="remember" class="m-0" id="remember_me" value="option2">
                                    <label for="remember_me" class="pointer">Remember me</label>
                                </div>

                                <div>
                                    @if (Route::has('password.request'))
                                    <a class="m-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group flex-complete mt-2">
                            <button type="submit" value="submit" class="btn btn-danger">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================LOGIN=================-->
@endsection
