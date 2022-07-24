<div class="navigation">
    <div class="navigation-desktop">
        <div class="d-flex">
            <a href="{{route('website.home')}}">
                <img class="logo" src="{{asset('img/img-template/logo.png')}}" alt="">
            </a>
        </div>
        <!-- Searchbar -->
        <div class="flex-grow-1 mx-4">
            @include('website.pages.navigation-module.searchbar')
        </div>
        <!-- Searchbar -->
        <div class="flex-grow-1 d-flex justify-content-center">
            <ul class="ul-navigation-desktop">
                <li>
                    <a href="{{route('website.home')}}" class="{{ Route::current()->getName() == 'website.home' ? 'active-navigation' : ''}}">Home</a>
                </li>
                <li>
                    <a href="{{route('website.shop')}}" class="{{ Route::current()->getName() == 'website.shop' ? 'active-navigation' : ''}}">Shop</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
                @auth
                <li class="account">
                    <div class="flex-complete avatar-account">
                        <div class="flex-complete avatar me-1">
                            {{StringHelpers::first_letter_of_word(Auth::user()->firstname)}} {{StringHelpers::first_letter_of_word(Auth::user()->lastname)}}
                        </div>
                        <span><i class="fa-solid fa-angle-down"></i></span>
                    </div>
                    <div class="account-dropdown">
                        <ul>
                            <li>
                                <a href="{{route('user.dashboard')}}" class="{{ Route::current()->getName() == 'user.dashboard' ? 'active-navigation' : ''}}">
                                    <i class="fa fa-user me-1 ms-1 my-danger"></i>Account
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{route('user.logout')}}">
                                    @csrf
                                    <a class="pointer" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">

                                        <i class="fa fa-power-off me-1 ms-1 my-danger"></i>
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li>
                    <a href="{{route('login')}}" class="{{ Route::current()->getName() == 'login' ? 'active-navigation' : ''}}">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="{{ Route::current()->getName() == 'register' ? 'active-navigation' : ''}}">Register</a>
                </li>
                @endauth
                <li class="d-none">
                    <a href="{{route('login')}}">DROPDOWN
                    </a>
                    <ul>
                        <li><a href="category.html">Shop Category</a></li>
                        <li><a href="single-product.html">Product Details</a></li>
                        <li><a href="checkout.html">Product Checkout</a></li>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="confirmation.html">Confirmation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('cart.show')}}" class="cart">
                        <span>
                            <i class="fa-solid fa-bag-shopping text-danger"></i>
                        </span>
                        (<span class="cart_nb_items">{{Cart::count()}}</span>)
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-hamburger-responsive">
            <i class="fa-solid fa-bars"></i>
            <i class="fa-solid fa-xmark d-none"></i>
        </div>
    </div>
    @include('website.pages.mega-menu-module.mega-menu')
</div>
