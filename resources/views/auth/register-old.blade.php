@extends('website.layouts.base-website')
@section('title')
Register
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

                <!-- create a new account -->
                <div class="col-md-12 col-sm-12 create-new-account">
                    <h2 class="heading-title">Create a new account</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="name">Name <span>*</span></label>
                            <input id="name" type="text" name="name" value="{{old('name')}}" {{-- required --}} autofocus class="form-control unicase-form-control text-input">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="email">Email <span>*</span></label>
                            <input id="email" type="email" name="email" value="{{old('email')}}" {{-- required --}} class="form-control unicase-form-control text-input">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="phone">Phone Number <span>*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control unicase-form-control text-input" value="{{old('phone')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input id="password" type="password" name="password" {{-- required --}} autocomplete="new-password" class="form-control unicase-form-control text-input">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                            <input id="password_confirmation" type="password" name="password_confirmation" {{-- required --}} class="form-control unicase-form-control text-input">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>
                </div>
                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

        @include('website.layouts.brands')
    </div><!-- /.container -->
</div>
@endsection
