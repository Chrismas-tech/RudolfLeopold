@extends('website.layouts.base-website')
@section('title')
Home
@endsection
@section('content')
@include('website.layouts.jumbotron')

<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>Biographie</p>
                    <h2>Rudolf Leopold</h2>
                </div>
            </div>
        </div>
        @if($default_language == 'en')
        <div class="col-12">
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
                </div>
                <div class="col-sm-8">
                    <div class="single-service-area d-flex flex-wrap mb-100">

                        <div class="text">
                            <p>The Viennese cellist Rudolf Leopold is one of the most versatile musicians of his generation. He completed his studies at the University of Music and Performing Arts in Vienna, studying cello with Richard Krotschak and Tobias Kühne, and, in addition, piano and composition. As a teenager Rudolf became a member of the Franz Schubert Quartet, which subsequently won the first prize at the European Broadcasting Union competition, resulting in the birth of a career, which included concerts and tours throughout Europe, Australia and the USA.
                            </p>
                            <p>His passion for baroque music led him early on to Nikolaus Harnoncourt and Concentus Musicus, where he recorded, among many other works, the Brandenburg Concertos of Bach. Rudolf was solo cellist for 25 years and he continues his collaboration with Concentus Musicus to the present day. He is also the founder of Il Concerto Viennese, which performed his reconstruction of Bach´s St. Mark´s Passion in 2013 at the festival Osterklang in Vienna, with further performances in Innsbruck and Graz.
                            </p>
                            <p>As a founding member of the renowned Vienna String Sextet, Rudolf enjoyed an international career spanning 25 years. With this ensemble he recorded the bulk of the string sextet literature for EMI and Pan Classics and wrote numerous arrangements for the sextet. His reconstruction of the first version of the Metamorphosen of Richard Strauss was published by Boosey and Hawkes and is performed around the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="single-service-area d-flex flex-wrap mb-100">

                        <div class="text">
                            <p>Throughout his career Rudolf has collaborated with prominent artists such as Sabine Meyer, Juliane Banse, Angelika Kirchschlager, Markus Schirmer, Paul Gulda, Benjamin Schmid and Andrea Jonasson and played many recitals and chamber music concerts with his wife, the pianist Teresa Turner-Jones.
                                He was invited by the legendary Alban Berg Quartet to perform Schubert’s famous string quintet, and he continues this tradition, performing the Schubert with the younger quartets of today’s generation.
                            </p>
                            <p>As a soloist, Rudolf has performed the cello concerto repertoire with orchestra (Dvorak’s Concerto in the Berliner Philharmonie and Tschaikowsky’s
                                Rococo Variations in the Konzerthaus in Vienna) and has revived rarities such as
                                Dohnányi, Enescu and Pfitzner with great success. He was honored to play the premiere performance of Ivan Eröd’s cello concerto at the Styriarte Festival in Graz.</p>
                            <p>
                                Rudolf Leopold taught chamber music at the University of Music in Vienna and was Professor of Violoncello at the University of Music and Performing Arts in Graz from 1990 to 2019.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        @else
        <div class="col-12">
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
                </div>
                <div class="col-sm-8">
                    <div class="single-service-area d-flex flex-wrap mb-100">
                        <div class="text">
                            <p>
                                Der vielseitige Musiker wurde 1954 in Wien geboren und studierte an der
                                dortigen Musikhochschule Violoncello bei Richard Krotschak und Tobias Kühne,
                                daneben Klavier und Tonsatz.
                                Seine Laufbahn begann 1974, als er den 1. Preis beim Wettbewerb der
                                European Broadcasting Union als Mitglied des Franz Schubert Quartetts errang,
                                worauf zahlreiche Tourneen durch Europa, in die USA und nach Australien
                                folgten.
                            </p>
                            <p>
                                Seine Begeisterung für Barockmusik führte ihn zu Nikolaus Harnoncourt, mit
                                dem er schon in seiner Jugend die „Brandenburgischen Konzerte“ aufnahm und
                                bis heute in dem von Harnoncourt gegründeten „Concentus Musicus“ tätig ist.
                                Mittlerweile gründete er sein eigenes Barockensemble „Il Concerto Viennese“,
                                mit dem er 2013 seine Rekonstruktion von Bachs Markuspassion in Wien, Graz
                                und Innsbruck zur Aufführung brachte.
                            </p>
                            <p>
                                Den Höhepunkt seiner Karriere bildete die Mitwirkung im Wiener Streichsextett,
                                mit dem er 25 Jahre lang die Welt bereiste. Mit diesem Ensemble spielte er die
                                wichtigsten Werke dieser Gattung für EMI und Pan Classics auf CD ein und
                                schrieb auch zahlreiche Bearbeitungen, wie z. B. die Rekonstruktion der
                                Urfassung von Richard Strauss´ „Metamorphosen“, die bei Boosey &amp; Hawkes
                                verlegt ist und heute auf der ganzen Welt gespielt wird.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="single-service-area d-flex flex-wrap mb-100">
                        <div class="text">
                            <p> Rudolf Leopold hat mit prominenten Künstlern wie Sabine Meyer, Juliane Banse,
                                Angelika Kirchschlager, Markus Schirmer, Paul Gulda, Benjamin Schmid und
                                Andrea Jonasson zusammengearbeitet. Mit seiner Frau, der Pianistin Teresa
                                Turner-Jones spielte er unzählige Duo- und Trioabende.
                                Auch wurde er vom legendären Alban Berg Quartett eingeladen, das
                                Streichquintett von Schubert zu musizieren. Diese Tradition setzt er heute mit
                                Streichquartetten der jüngeren Generation fort.
                            </p>
                            <p> Als Solist hat Rudolf Leopold nicht nur die bedeutendsten Cellokonzerte
                                aufgeführt ( 2008 Dvoraks Konzert in der Berliner Philharmonie, 2013
                                Tschaikowskys Rokoko-Variationen im Wiener Konzerthaus ), sondern auch
                                Raritäten wie Dohnányi, Enescu und Pfitzner auferweckt und Ivan Eröds
                                Konzert beim Festival Styriarte in Graz uraufgeführt.
                                Rudolf Leopold war Dozent für Kammermusik an der Wiener Musikhochschule
                                und danach von 1990 bis 2019 als ordentlicher Professor für Violoncello an der
                                Universität für Musik und darstellende Kunst in Graz tätig.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img class="img-fluid" src="{{asset('img/img-template/rudolf-leopold/rudolf-leopold-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        @endif
    </div>
</section>



<!-- ##### Latest Albums Area Start ##### -->
<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>See what’s new</p>
                    <h2>Latest Albums</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="ablums-text text-center mb-70">
                    <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="albums-slideshow owl-carousel">
                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a1.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>The Cure</h5>
                            </a>
                            <p>Second Song</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a2.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>Sam Smith</h5>
                            </a>
                            <p>Underground</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a3.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>Will I am</h5>
                            </a>
                            <p>First</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a4.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>The Cure</h5>
                            </a>
                            <p>Second Song</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a5.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>DJ SMITH</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a6.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>The Ustopable</h5>
                            </a>
                            <p>Unplugged</p>
                        </div>
                    </div>

                    <!-- Single Album -->
                    <div class="single-album">
                        <img src="{{asset('img/img-template/bg-img/a7.jpg')}}" alt="">
                        <div class="album-info">
                            <a href="#">
                                <h5>Beyonce</h5>
                            </a>
                            <p>Songs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Latest Albums Area End ##### -->

<!-- ##### Buy Now Area Start ##### -->
<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>See what’s new</p>
                    <h2>Buy What’s New</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b1.jpg')}}" alt="">
                        <!-- Album Price -->
                        <div class="album-price">
                            <p>$0.90</p>
                        </div>
                        <!-- Play Icon -->
                        <div class="play-icon">
                            <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                        </div>
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Garage Band</h5>
                        </a>
                        <p>Radio Station</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b2.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b3.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Jess Parker</h5>
                        </a>
                        <p>The Album</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="400ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b4.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="500ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b1.jpg')}}" alt="">
                        <!-- Album Price -->
                        <div class="album-price">
                            <p>$0.90</p>
                        </div>
                        <!-- Play Icon -->
                        <div class="play-icon">
                            <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                        </div>
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Garage Band</h5>
                        </a>
                        <p>Radio Station</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="600ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b2.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b3.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Jess Parker</h5>
                        </a>
                        <p>The Album</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b4.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b1.jpg')}}" alt="">
                        <!-- Album Price -->
                        <div class="album-price">
                            <p>$0.90</p>
                        </div>
                        <!-- Play Icon -->
                        <div class="play-icon">
                            <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                        </div>
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Garage Band</h5>
                        </a>
                        <p>Radio Station</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="400ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b2.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="500ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b3.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Jess Parker</h5>
                        </a>
                        <p>The Album</p>
                    </div>
                </div>
            </div>

            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="single-album-area wow fadeInUp" data-wow-delay="600ms">
                    <div class="album-thumb">
                        <img src="{{asset('img/img-template/bg-img/b4.jpg')}}" alt="">
                    </div>
                    <div class="album-info">
                        <a href="#">
                            <h5>Noises</h5>
                        </a>
                        <p>Buble Gum</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Buy Now Area End ##### -->

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
