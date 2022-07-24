<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="mb-3">
                    <img src="{{asset('img/img-template/logo.png')}}" alt="">
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                    magna aliqua.
                </p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div>
                    <h5>Newsletter</h5>
                    <p>Stay update with our latest</p>
                    <div>
                        <form target="_blank" novalidate="true" action="" method="post" class="form-inline">
                            <div class="d-flex flex-row">
                                <input class="form-control" name="email" placeholder="Enter Email" required="" type="email">
                                <button class="btn my-bg-danger my-white">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="social-icons">
                    <h5>Follow Us</h5>
                    <p>Let us be social</p>
                    <div class="d-flex align-items-center">
                        
                        @if($general_website_settings->facebook)
                        <a href="{{$general_website_settings->facebook}}" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        @endif
                        @if($general_website_settings->facebook)
                        <a href="{{$general_website_settings->twitter}}" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        @endif
                        @if($general_website_settings->facebook)
                        <a href="{{$general_website_settings->linkedin}}" target="_blank">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        @endif
                        @if($general_website_settings->facebook)
                        <a href="{{$general_website_settings->spotify}}" target="_blank">
                            <i class="fa-brands fa-spotify"></i>
                        </a>
                        @endif
                        @if($general_website_settings->facebook)
                        <a href="{{$general_website_settings->youtube}}" target="_blank">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span>{!! $general_website_settings->copyright !!}</span>
        </div>
    </div>
</footer>
