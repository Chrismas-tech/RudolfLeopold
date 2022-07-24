<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">

                <div>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{route('website.home')}}"><img src="{{asset('img/img-template/logo.png')}}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                </div>

                <div>
                    @include('website.pages.searchbar-module.searchbar-module')
                </div>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('website.home')}}">Home</a></li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.dashboard')}}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{route('user.logout')}}">
                                @csrf
                                <a class="nav-link pointer" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    <i class="fa fa-power-off me-1 ms-1"></i>
                                    Logout
                                </a>
                            </form>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                        @endauth
                        <li class="nav-item submenu dropdown">
                            {{-- <span class="ti-user"></span> --}}
                            <a href="{{route('login')}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DROPDOWN
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="#" class="cart text-black">
                                <span>
                                    <i class="fa-solid fa-bag-shopping text-danger"></i>
                                </span>
                                (3)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </div>
</header>
<!-- End Header Area -->
