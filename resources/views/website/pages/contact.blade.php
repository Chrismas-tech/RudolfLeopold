{{-- <section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-3">
                <div class="contact-content mb-100">
                    <!-- Title -->
                    <div class="contact-title mb-50">
                        <h5>Contact Info</h5>
                    </div>

                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-placeholder"></span>
                        </div>
                        <p>1481 Creekside Lane Avila Beach, CA 931</p>
                    </div>

                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-smartphone"></span>
                        </div>
                        <p>+53 345 7953 32453</p>
                    </div>

                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-mail"></span>
                        </div>
                        <p>yourmail@gmail.com</p>
                    </div>

                    <!-- Contact Social Info -->
                    <div class="contact-social-info mt-50">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-9">
                <!-- ##### Google Maps ##### -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen=""></iframe>
                </div>
            </div>

        </div>
    </div>
</section> --}}


<section class="contact-area pt-5 pb-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <p>Contact me</p>
                    <h2>Send an Email</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">

                    <div class="flex-complete">
                        <img id="spinner" class="d-none" src="{{asset('img/img-template/loading-gif/giphy.gif')}}" alt="">
                    </div>

                    <div id="mail-errors">
                    </div>

                    <div id="mail-success">
                    </div>

                    <form id="contact_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" {{--  required="required" --}} value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" {{--  required="required" --}} value="{{ old('email') }}" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" {{--  required="required" --}} value="{{ old('subject') }}" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="file" id="files" class="form-control" name="files[]" accept="image/*,application/pdf" enctype="multipart/form-data" multiple>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Message" {{--  required="required" --}} maxlength="1300">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn oneMusic-btn mt-30" type="submit" id="submit_contact_form">Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
