<div class="navigation-responsive">
    <ul class="ul-navigation-responsive">
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
        <li>
            <a href="{{route('user.dashboard')}}" class="{{ Route::current()->getName() == 'user.dashboard' ? 'active-navigation' : ''}}"><i class="fa fa-user me-1 ms-1 my-danger"></i>My Account</a>
        </li>
        <li>
            <form method="POST" action="{{route('user.logout')}}">
                @csrf
                <a class="pointer" onclick="event.preventDefault();
                        this.closest('form').submit();">
                    <i class="fa fa-power-off me-1 ms-1"></i>
                    Logout
                </a>
            </form>
        </li>
        @else
        <li>
            <a href="{{route('login')}}" class="{{ Route::current()->getName() == 'login' ? 'active-navigation' : ''}}">Login</a>
        </li>
        <li>
            <a href="{{route('register')}}" class="{{ Route::current()->getName() == 'register' ? 'active-navigation' : ''}}">Register</a>
        </li>
        @endauth
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
