@extends('website.layouts.base-website')
@section('title')
Forgot your password
@endsection
@section('subtitle')
Forgot your password
@endsection
@section('content')

@include('website.layouts.banner')


<!--================Login Box Area =================-->
<section class="login_box_area mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login_form_inner p-3 text-left">


                    @if((Session::get('status')))
                    <div class="alert alert-info">
                        <p class="p-0 m-0">A new verification link has been sent to the <strong>email address</strong> you provided during registration.</p>
                    </div>
                    @else
                    <h2 class="pb-4 pt-4">FORGOT YOUR PASSWORD ?</h2>
                    <div class="alert alert-success">
                        <p class="p-0 m-0">Let us know your <strong>email address</strong> and we will email you a <strong>password reset link</strong> that will allow you to choose a new one.</p>
                    </div>
                    @endif

                    <form class="row login_form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('email') my-is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger mt-1 p-0">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group flex-complete mt-3">
                            <button type="submit" value="submit" class="btn my-bg-danger my-white">Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Login Box Area =================-->


@include('website.layouts.brands')
</div><!-- /.container -->
</div>
@endsection
