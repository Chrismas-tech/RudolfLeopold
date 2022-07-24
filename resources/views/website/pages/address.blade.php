@extends('website.layouts.base-website')
@section('title')
Address
@endsection
@section('subtitle')
Address
@endsection
@section('content')

@include('website.layouts.banner')
<div class="container mt-5 mb-5">
    <div class="user-profile">
        <div class="mb-4">
            <a href="{{route('user.dashboard')}}" class="btn my-bg-danger my-white"><i class="fa-solid fa-arrow-right-from-bracket me-1 my-white"></i>Get Back to Dashboard</a>
        </div>
        <div class="row gy-5">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('user.address.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title m-0"> <i class="fa-solid fa-address-card me-2 my-danger"></i>Edit your delivery address</h4>
                            </div>

                            @if((Session::get('form_1')))
                            <div class="mb-4">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger p-2" role="alert">
                                    <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="col-md-12 form-group mb-3">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control @error('name') my-is-invalid @enderror" id="firstname" name="firstname" placeholder="Your firstFirstnamename" value="{{old('firstname') ? old('firstname') : $user->firstname}}">
                                @error('firstname')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control @error('lastname') my-is-invalid @enderror" id="lastname" name="lastname" placeholder="Your Lastname" value="{{old('lastname') ? old('lastname') : $user->lastname}}">
                                @error('lastname')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') my-is-invalid @enderror" id="email" name="email" placeholder="Your email" value="{{old('email') ? old('email') : $user->email}}">
                                @error('email')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') my-is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{old('address') ? old('address') : $user->address}}">
                                @error('address')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control @error('city') my-is-invalid @enderror" id="city" name="city" placeholder="City"  value="{{old('city') ? old('city') : $user->city}}">
                                @error('city')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="name">Postal Code</label>
                                <input type="postal_code" class="form-control @error('postal_code') my-is-invalid @enderror" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{old('postal_code') ? old('postal_code') : $user->postal_code}}">
                                @error('postal_code')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            
                            <div class="col-md-12 form-group mb-3">
                                <label for="phone">Phone number</label>
                                <input type="text" class="form-control @error('phone') my-is-invalid @enderror" id="phone" name="phone" placeholder="Your phone number" value="{{old('phone') ? old('phone') : $user->phone}}">
                                @error('phone')
                                <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="card-body d-flex justify-content-center">
                                <button type="submit" class="btn my-bg-danger my-white">
                                   Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
