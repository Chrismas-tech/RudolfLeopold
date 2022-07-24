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
                    <h2 class="heading-title mb-2">Please verify your Email</h2>

                    @if((Session::get('status')))
                    <div class="alert alert-success">
                        <p class="p-0 m-0">A new verification link has been sent to the email address you provided during registration.</p>
                    </div>
                    @else
                    <div class="alert alert-success">
                        <p class="p-0 m-0">Thanks for signing up!</p>
                        <p>Before getting started, could you verify your email address by clicking on the link we just emailed to you?</p>
                        <p> If you didn't receive the email, we will gladly send you another.</p>
                    </div>
                    @endif
                </div>


                <div class="col-md-12 col-sm-12">
                    <div style="display: flex;align-items: center">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="margin-right:20px;">
                                Resend Verification Email
                            </button>
                        </form>

                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                Log Out
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
            <!-- Sign-in -->
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->

    @include('website.layouts.brands')
</div><!-- /.container -->
</div>
@endsection
