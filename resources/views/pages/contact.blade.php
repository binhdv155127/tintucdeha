@extends('layout.master')

@section('meba')
    @include('layout.banner')
@endsection

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                        <!-- Google Maps -->
                        <div class="map-area mb-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Contact Info</h5>
                        </div>

                        <div class="contact-information mb-30">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mauris id scelerisque eleifend. Nunc vestibulum cursus quam at scelerisque. Aliquam quis varius orci, vel tincidunt est. Proin ac tincidunti, atmots interdum erat. Maecenas neque lorem, aliquet in tempus non, efficitur ac neque.</p>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Our Office:</p>
                                    <h6>5520 Quebec Place, Brooklyn, NY , USA 10000</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Email:</p>
                                    <h6>infodeercreative@gmail.com</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Phone:</p>
                                    <h6>(+88) 012-3455-0028</h6>
                                </div>
                            </div>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>GET IN TOUCH</h5>
                        </div>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @include('layout.danhmuc')
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection