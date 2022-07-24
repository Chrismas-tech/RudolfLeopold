@extends('website.layouts.base-website')
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
                    <h4 >Reset your Password</h4>

                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" value="{{old('email', $request->email)}}" autofocus {{-- required --}}>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" name="password" id="password" class="form-control unicase-form-control text-input" {{-- required --}} autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input" {{-- required --}}>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
                    </form>
                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

        @include('website.layouts.brands')
    </div><!-- /.container -->
</div>
@endsection
