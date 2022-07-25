@extends('website.layouts.base-website')
@section('title')
Home
@endsection
@section('content')
@include('website.layouts.jumbotron')

@include('website.pages.biography')

@if($ytb_videos)
@include('website.pages.videos-gallery')
@endif

@if($photos_gallery)
@include('website.pages.photos-gallery')
@endif

<!-- ##### Featured Artist Area Start ##### -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url('img/img-template/bg-img/bg-4.jpg');">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="featured-artist-thumb">
                    <img src="{{asset('img/img-template/bg-img/fa.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <div class="featured-artist-content">
                    <!-- Section Heading -->
                    <div class="section-heading white text-left mb-30">
                        <p>See what’s new</p>
                        <h2>Buy What’s New</h2>
                    </div>
                    <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->

<!-- ##### Miscellaneous Area Start ##### -->
<section class="miscellaneous-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- ***** Weeks Top ***** -->
            <div class="col-12 col-lg-4">
                <div class="weeks-top-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>This week’s top</h2>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt1.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>Sam Smith</h6>
                            <p>Underground</p>
                        </div>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt2.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>Power Play</h6>
                            <p>In my mind</p>
                        </div>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt3.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>Cristinne Smith</h6>
                            <p>My Music</p>
                        </div>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt4.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>The Music Band</h6>
                            <p>Underground</p>
                        </div>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt5.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>Creative Lyrics</h6>
                            <p>Songs and stuff</p>
                        </div>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/wt6.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <h6>The Culture</h6>
                            <p>Pop Songs</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ***** New Hits Songs ***** -->
            <div class="col-12 col-lg-4">
                <div class="new-hits-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>New Hits</h2>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt7.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>Sam Smith</h6>
                                <p>Underground</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="150ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt8.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>Power Play</h6>
                                <p>In my mind</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="200ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt9.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>Cristinne Smith</h6>
                                <p>My Music</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="250ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt10.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>The Music Band</h6>
                                <p>Underground</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt11.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>Creative Lyrics</h6>
                                <p>Songs and stuff</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>

                    <!-- Single Top Item -->
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="350ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="{{asset('img/img-template/bg-img/wt12.jpg')}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>The Culture</h6>
                                <p>Pop Songs</p>
                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- ***** Popular Artists ***** -->
            <div class="col-12 col-lg-4">
                <div class="popular-artists-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <p>See what’s new</p>
                        <h2>Popular Artist</h2>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa1.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>Sam Smith</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="150ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa2.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>William Parker</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="200ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa3.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>Jessica Walsh</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="250ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa4.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>Tha Stoves</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa5.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>DJ Ajay</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="350ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa6.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>Radio Vibez</p>
                        </div>
                    </div>

                    <!-- Single Artist -->
                    <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="400ms">
                        <div class="thumbnail">
                            <img src="{{asset('img/img-template/bg-img/pa7.jpg')}}" alt="">
                        </div>
                        <div class="content-">
                            <p>Music 4u</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Miscellaneous Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url('img/img-template/bg-img/bg-2.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                    <p>See what’s new</p>
                    <h2>Get In Touch</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->
@endsection
