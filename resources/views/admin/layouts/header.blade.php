<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{asset('img/img-admin/logo.png')}}" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge my-bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{asset('img/img-admin/messages-1.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{asset('img/img-admin/messages-2.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{asset('img/img-admin/messages-3.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{route('admin.profile.photo.serve')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{$admin->firstname}} {{$admin->lastname}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{$admin->firstname}} {{$admin->lastname}}</h6>
                        <span>Administrator</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile', $admin->id)}}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    {{-- <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li> --}}

                    <li>
                        <form method="POST" action="{{route('admin.logout')}}">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                Sign Out
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>

{{-- <header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">
<!-- Logo icon -->
<div class="d-flex align-items-center">
    <b class="logo-icon ps-2">
        <img src="{{asset('img/img-admin/logo-icon.png')}}" alt="homepage" class="light-logo" width="25" />
    </b>

    <span class="logo-text ms-2">
        Administration
    </span>
</div>

</a>
<!-- ============================================================== -->
<!-- End Logo -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Toggle which is visible on mobile only -->
<!-- ============================================================== -->
<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
</div>
<!-- ============================================================== -->
<!-- End Logo -->
<!-- ============================================================== -->
<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-start me-auto">
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
        </li>
        <!-- ============================================================== -->
        <!-- create new -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                </li>
            </ul>
        </li>
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        <li class="nav-item search-box">
            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify fs-4"></i></a>
            <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
            </form>
        </li>
    </ul>
    <!-- ============================================================== -->
    <!-- Right side toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-end">
        <!-- ============================================================== -->
        <!-- Comment -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell font-24"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                </li>
            </ul>
        </li>
        <!-- ============================================================== -->
        <!-- End Comment -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Messages -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="font-24 mdi mdi-comment-processing"></i>
            </a>
            <ul class="
                      dropdown-menu dropdown-menu-end
                      mailbox
                      animated
                      bounceInDown
                    " aria-labelledby="2">
                <ul class="list-style-none">
                    <li>
                        <div >
                            <!-- Message -->
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="
                                  btn btn-success btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "><i class="mdi mdi-calendar text-white fs-4"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Event today</h5>
                                        <span class="mail-desc">Just a reminder that event</span>
                                    </div>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="
                                  btn btn-info btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "><i class="mdi mdi-settings fs-4"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Settings</h5>
                                        <span class="mail-desc">You can customize this template</span>
                                    </div>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="
                                  btn btn-primary btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "><i class="mdi mdi-account fs-4"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                    </div>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="javascript:void(0)" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="
                                  btn btn-danger btn-circle
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "><i class="mdi mdi-link fs-4"></i></span>
                                    <div class="ms-2">
                                        <h5 class="mb-0">Luanch Admin</h5>
                                        <span class="mail-desc">Just see the my new admin!</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </ul>
        </li>
        <!-- ============================================================== -->
        <!-- End Messages -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="
                      nav-link
                      dropdown-toggle
                      text-muted
                      waves-effect waves-dark
                      pro-pic
                    " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{route('admin.profile.photo.serve')}}" alt="user" class="rounded-circle me-2" width="31">
            </a>
            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                <a href="{{route('admin.profile', $admin->id)}}" class="dropdown-item" href="#"><i class="mdi mdi-account me-1 ms-1"></i>
                    My Profile
                </a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i>
                    My Balance
                </a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i>
                    Inbox
                </a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Account Setting
                </a>
                <form method="POST" action="{{route('admin.logout')}}">
                    @csrf
                    <button class="dropdown-item pointer" onclick="event.preventDefault();
                            this.closest('form').submit();">
                        <i class="fa fa-power-off me-1 ms-1"></i>
                        Logout
                    </button>
                </form>

            </ul>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
    </ul>
</div>
</nav>
</header>
--}}
