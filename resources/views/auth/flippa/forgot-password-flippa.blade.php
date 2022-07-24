@extends('website.layouts.base-website')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{route('website.home')}}">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
</div>

<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login_form_inner">
                    <h4 >Forgot your password ?</h4>

                    @if((Session::get('status')))
                    <div class="alert alert-success">
                        <p class="p-0 m-0">A new verification link has been sent to the <strong>email address</strong> you provided during registration.</p>
                    </div>

                    @else
                    <div class="alert alert-info">
                        <p class="p-0 m-0">Let us know your <strong>email address</strong> and we will email you a <strong>password reset link</strong> that will allow you to choose a new one.</p>
                    </div>
                    @endif


                    <form method="POST" action="{{ route('password.email') }}">
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
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('website.layouts.brands')
</div>
</div>
@endsection
