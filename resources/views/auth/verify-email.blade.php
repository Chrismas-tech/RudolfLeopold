@extends('website.layouts.base-website')
@section('title')
Verify your Email
@endsection
@section('subtitle')
Verify your Email
@endsection
@section('content')

@include('website.layouts.banner')


<div class="body-content">
    <div class="container">

        <div class="sign-in-page mt-5 mb-5">

            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-12 col-sm-12 sign-in">
                    <h2 class="heading-title mb-2"></h2>

                    @if((Session::get('status')))
                    <div class="alert alert-success">
                        <h5 class="p-0 m-0">A new verification link has been sent to the email address you provided during registration.</h5>
                    </div>
                    @else
                    <div class="alert alert-success">
                        <h5 class="p-0 m-0">Thanks for signing up! Before getting started...</h5>
                        <div class="mt-4">
                            <p>Verify your email address by clicking on the link we just emailed to you.</p>
                            <p>If you didn't receive the email, we will gladly send you another.</p>
                        </div>
                    </div>
                    @endif
                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="flex-complete">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn my-bg-danger my-white">
                                Send Verification Email
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
