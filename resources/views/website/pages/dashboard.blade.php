@extends('website.layouts.base-website')
@section('title')
Dashboard
@endsection
@section('subtitle')
Dashboard
@endsection
@section('content')

@include('website.layouts.banner')
<div class="container mt-5 mb-5">
    <div class="user-profile">
        <div class="user-profile-title mt-3 mb-3">
            <h4>Welcome to your account {{Auth::user()->name}}</h4>
        </div>
        <div class="row gy-3">
            <div class="col-lg-4">
                <a href="{{route('user.address')}}">
                    <div class="box-profile">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="user-profile-icons" src="{{asset('img/img-template/profile-icons/account.png')}}" alt="">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-8">
                                <h5>Account informations</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user.address')}}">
                    <div class="box-profile">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="user-profile-icons" src="{{asset('img/img-template/profile-icons/address.png')}}" alt="">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-8">
                                <h5>Address</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user.address')}}">
                    <div class="box-profile">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="user-profile-icons" src="{{asset('img/img-template/profile-icons/orders.png')}}" alt="">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-8">
                                <h5>Your Orders</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user.address')}}">
                    <div class="box-profile">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="user-profile-icons" src="{{asset('img/img-template/profile-icons/creditcard.png')}}" alt="">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-8">
                                <h5>Your Payments</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
