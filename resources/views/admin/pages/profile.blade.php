@extends('admin.layouts.base-admin')
@section('title')
Your Profile
@endsection
@section('subtitle')
Your Profile
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('admin.profile.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <h3> <i class="fas fa-user me-2"></i>Edit your Admin Profile</h3>

                            @if((Session::get('form_1')))
                            <div class="mb-4">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger p-2" role="alert">
                                    <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="divider"></div>

                            @if($admin->avatar_path)
                            {{-- {{dd($admin)}} --}}
                            <div class="flex-complete mt-4">
                                <img class="profile-photo" src="{{route('admin.profile.photo.serve')}}" alt="" class="img-fluid">
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label>Firstname</label>
                                        <div>
                                            <input type="text" name="firstname" class="form-control {{ $errors->has('firtsname') ? 'is-invalid' : ''}}" placeholder="Name" value="{{$admin->firstname}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label>Lastname</label>
                                        <div>
                                            <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : ''}}" placeholder="Name" value="{{$admin->lastname}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="col-md-12 form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control @error('address') my-is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{$admin->address}}">
                                        @error('address')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                    <div class="col-md-12 form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control @error('city') my-is-invalid @enderror" id="city" name="city" placeholder="City" value="{{$admin->city}}">
                                        @error('city')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control @error('postal_code') my-is-invalid @enderror" id="postal_code" name="postal_code" placeholder="Postal Code" value="{{$admin->postal_code}}">
                                        @error('postal_code')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control @error('phone') my-is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{$admin->phone}}">
                                        @error('phone')
                                        <span class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label>Email</label>
                                <div>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" value="{{$admin->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label>Avatar Upload</label>
                                <div>
                                    <input type="file" id="mainImg"" name=" img_photo" accept="image/*" class="form-control {{ $errors->has('file') ? 'is-invalid' : ''}}">
                                </div>
                            </div>

                            <div class="div-img d-none text-center">
                                <h3 id="title_preview_img"></h3>
                                <img id="preview_main_image" class="img-fluid-main-variant" src="" alt="">
                            </div>

                            <div class="card-body d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.profile.password', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h3><i class="fas fa-unlock me-2"></i>Modify your password</h3>

                        @if((Session::get('form_2')))
                        <div class="mb-4">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger p-2" role="alert">
                                <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="divider"></div>

                        <div class="form-group">
                            <label>Current Password</label>
                            <div>
                                <input type="password" id="current_password" name="old_password" class="form-control
                                    {{ $errors->has('old_password') ? 'is-invalid' : ''}}" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('old_password')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>New Password
                            </label>
                            <div>
                                <input type="password" id="password" name="password" class="form-control
                                    {{ $errors->has('password') ? 'is-invalid' : ''}}" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('password')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Confirmation Password</label>
                            <div>
                                <input type="password" name="password_confirmation" id="password_confirmation" data-validation-match-match="password" class="form-control
                                    {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}
                                    " aria-invalid="false" value="{{old('password_confirmation')}}">
                            </div>
                        </div>


                        <div class="card-body d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>

@endsection
