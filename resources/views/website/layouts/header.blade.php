<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <div class="d-flex text-white">
                        <a href="{{route('website.home')}}" class="nav-brand"><img src="{{asset('img/img-template/logo/logo.png')}}" alt=""></a>
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{route('website.home')}}">Home</a></li>
                                <li><a id="anchor-biography" class="pointer">Biography</a></li>
                                <li><a href="{{route('website.video-gallery')}}">Video Gallery</a></li>
                                <li><a href="{{route('website.photo-gallery')}}">Photo Gallery</a></li>
                                <li><a href="{{route('website.contact')}}">CD Albums</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                @if($default_language == 'en')
                                <li>
                                    <a class="" href="{{route('website.home', ['lg' => 'at'])}}">
                                        <img class="flag" src="{{asset('img/img-template/languages-flag/austria.png')}}" alt="">
                                        <span>Deutsch</span>
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a class="" href="{{route('website.home', ['lg' => 'en'])}}">
                                        <img class="flag" src="{{asset('img/img-template/languages-flag/english.png')}}" alt="">
                                        <span class="ml-1">English</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
