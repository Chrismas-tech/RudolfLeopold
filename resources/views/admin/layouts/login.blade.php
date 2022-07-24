<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('img/img-admin/logo.png')}}">


    <title>NiceAdmin | Login</title>

    <!-- CSRF -->
    <meta name="_token" content="{{ csrf_token() }}">

    @include('admin.layouts.css')

    <link rel="stylesheet" href="{{asset('css/admin-css/app.css')}}">
</head>

<body>
    @include('admin.layouts.preloader')
    <main>
        <div class="container">

            <section class="section login-admin register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">

                                <div class="card-body">


                                    <div class="d-flex justify-content-center">
                                        <h3 class="logo d-flex align-items-center w-auto">
                                            <img src="{{asset('img/img-admin/logo.png')}}" alt="">
                                            Administrator
                                        </h3>
                                    </div>


                                    <!-- Form -->
                                    <form method="POST" action="{{ route('admin.login') }}">
                                        @csrf

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        @if((Session::get('errors')))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Whoops! Something went wrong !
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div> @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{$error}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endforeach
                                        @endif


                                        <div class="col-12 mb-3 mt-3">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <input type="email" name="email" class="form-control" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="yourPassword">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" checked value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                        <div class="divider mt-4 mb-4"></div>

                                        <div class="col-12">
                                            <div class="flex-complete">
                                                <a class="btn btn-sm my-bg-success text-white" href="{{route('website.home')}}">Return to the website</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    @include('sweetalert::alert')
    <script src="{{asset('js/admin-js/app.js')}}"></script>
</body>
</html>
