@extends('frontend.template.default')

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="float-end">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            <img src="{{asset('frontend/assets/img/portfolio/1.jpg')}}" alt="">
        </div>
        </div>
    </div>
</div>

<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active" style="background-image: url({{ asset('frontend/assets/img/hero-carousel/1.jpg') }})">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">The Best Business Information </h2>
                    <p class="animate__animated animate__fadeInUp">We're In The Business Of Helping You Start Your Business</p>
                    <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url({{ asset('frontend/assets/img/hero-carousel/2.jpg') }})">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                    <p class="animate__animated animate__fadeInUp">Helping Business Security & Peace of Mind for Your Family</p>
                    <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url({{ asset('frontend/assets/img/hero-carousel/3.jpg') }})">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                    <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem</p>
                    <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>

<main id="main">

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="about-move" style="padding-bottom:10px;">
                    <div class="services-details" style="background: rgba(0, 0, 0, 0.8); border-radius:25px;">
                        <div class="single-services">
                            <a class="services-icon" href="#">
                            <i class="bi bi-briefcase" style="color: white;"></i>
                            </a>
                            <h4 style="color: white;">Visa Services</h4>
                            <p style="color:white; padding: 0px 10px 30px 10px;">
                                The visa process in Indonesia can be challenging; let us help make your life easier. Competitive pricing and ethical practices are the reason we are quickly becoming Indonesia’s favourite agency.
                            </p>
                            <a href="#about" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="about-move" style="padding-bottom:10px;">
                    <div class="services-details" style="background: rgba(0, 0, 0, 0.8); border-radius:25px;">
                        <div class="single-services">
                            <a class="services-icon" href="#">
                            <i class="bi bi-briefcase" style="color: white;"></i>
                            </a>
                            <h4 style="color: white;">Company Establishment</h4>
                            <p style="color:white; padding: 0px 10px 40px 10px;">
                                The visa process in Indonesia can be challenging; let us help make your life easier. Competitive pricing and ethical practices are the reason we are quickly becoming Indonesia’s favourite agency.
                            </p>
                            <a href="#about" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="about-move" style="padding-bottom:10px;">
                    <div class="services-details" style="background: rgba(0, 0, 0, 0.8); border-radius:25px;">
                        <div class="single-services">
                            <a class="services-icon" href="#">
                            <i class="bi bi-briefcase" style="color: white;"></i>
                            </a>
                            <h4 style="color: white;">Tax & Accountancy</h4>
                            <p style="color:white; padding: 0px 10px 40px 10px;">
                                The visa process in Indonesia can be challenging; let us help make your life easier. Competitive pricing and ethical practices are the reason we are quickly becoming Indonesia’s favourite agency.
                            </p>
                            <a href="#about" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="about-move" style="padding-bottom:10px;">
                    <div class="services-details" style="background: rgba(0, 0, 0, 0.8); border-radius:25px;">
                        <div class="single-services">
                            <a class="services-icon" href="#">
                            <i class="bi bi-briefcase" style="color: white;"></i>
                            </a>
                            <h4 style="color: white;">Real Estate</h4>
                            <p style="color:white; padding: 0px 10px 40px 10px;">
                                The visa process in Indonesia can be challenging; let us help make your life easier. Competitive pricing and ethical practices are the reason we are quickly becoming Indonesia’s favourite agency.
                            </p>
                            <a href="#about" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


    <div id="about" class="about-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <h2>About Ananta Mitra Karya</h2>
            </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
                <div class="single-well">
                <a href="#">
                    <img src="{{asset('frontend/assets/img/about/1.jpg')}}" alt="">
                </a>
                </div>
            </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
                <div class="single-well">
                <a href="#">
                    <h4 class="sec-head">project Maintenance</h4>
                </a>
                <p>
                    Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                </p>
                <ul>
                    <li>
                    <i class="bi bi-check"></i> Interior design Package
                    </li>
                    <li>
                    <i class="bi bi-check"></i> Building House
                    </li>
                    <li>
                    <i class="bi bi-check"></i> Reparing of Residentail Roof
                    </li>
                    <li>
                    <i class="bi bi-check"></i> Renovaion of Commercial Office
                    </li>
                    <li>
                    <i class="bi bi-check"></i> Make Quality Products
                    </li>
                </ul>
                </div>
            </div>
            </div>
            <!-- End col-->
        </div>
        </div>
    </div>


    <div id="team" class="our-team-area area-padding">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <h2>Our special Team</h2>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
                <div class="team-img">
                <a href="#">
                    <img src="{{asset('frontend/assets/img/team/1.jpg')}}" alt="">
                </a>
                <div class="team-social-icon text-center">
                    <ul>
                    <li>
                        <a href="#">
                        <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="team-content text-center">
                <h4>Jhon Mickel</h4>
                <p>Seo</p>
                </div>
            </div>
            </div>
            <!-- End column -->
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
                <div class="team-img">
                <a href="#">
                    <img src="{{asset('frontend/assets/img/team/2.jpg')}}" alt="">
                </a>
                <div class="team-social-icon text-center">
                    <ul>
                    <li>
                        <a href="#">
                        <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="team-content text-center">
                <h4>Andrew Arnold</h4>
                <p>Web Developer</p>
                </div>
            </div>
            </div>
            <!-- End column -->
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
                <div class="team-img">
                <a href="#">
                    <img src="{{asset('frontend/assets/img/team/3.jpg')}}" alt="">
                </a>
                <div class="team-social-icon text-center">
                    <ul>
                    <li>
                        <a href="#">
                        <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="team-content text-center">
                <h4>Lellien Linda</h4>
                <p>Web Design</p>
                </div>
            </div>
            </div>
            <!-- End column -->
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
                <div class="team-img">
                <a href="#">
                    <img src="{{asset('frontend/assets/img/team/4.jpg')}}" alt="">
                </a>
                <div class="team-social-icon text-center">
                    <ul>
                    <li>
                        <a href="#">
                        <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="team-content text-center">
                <h4>Jhon Powel</h4>
                <p>Seo Expert</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

<!-- ======= Rviews Section ======= -->
<div class="reviews-area">
    <div class="row g-0">
    <div class="col-lg-6">
        <img src="{{asset('frontend/assets/img/about/2.jpg')}}" alt="" class="img-fluid">
    </div>
    <div class="col-lg-6 work-right-text d-flex align-items-center">
        <div class="px-5 py-5 py-lg-0">
        <h2>working with us</h2>
        <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
        <a href="#contact" class="ready-btn scrollto">Contact us</a>
        </div>
    </div>
    </div>
</div><!-- End Rviews Section -->

<!-- ======= Pricing Section ======= -->
<div id="pricing" class="pricing-area area-padding">
    <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline text-center">
            <h2>Trusted By</h2>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            oke
        </div>
    </div>
    </div>
</div><!-- End Pricing Section -->

<!-- ======= Testimonials Section ======= -->
<div id="testimonials" class="testimonials">
    <div class="container">

    <div class="testimonials-slider swiper">
        <div class="swiper-wrapper">

        <div class="swiper-slide">
            <div class="testimonial-item">
            <img src="{{asset('frontend/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
            <div class="testimonial-item">
            <img src="{{asset('frontend/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
            <div class="testimonial-item">
            <img src="{{asset('frontend/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
            <div class="testimonial-item">
            <img src="{{asset('frontend/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
            <div class="testimonial-item">
            <img src="{{asset('frontend/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            </div>
        </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
    </div>

    </div>
</div><!-- End Testimonials Section -->

<!-- ======= Blog Section ======= -->
<div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
    <div class="blog-overly"></div>
    <div class="container ">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            <h2>Latest News</h2>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- Start Left Blog -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
            <div class="single-blog-img">
                <a href="blog.html">
                <img src="{{ asset('frontend/assets/img/blog/1.jpg') }}" alt="">
                </a>
            </div>
            <div class="blog-meta">
                <span class="comments-type">
                <i class="fa fa-comment-o"></i>
                <a href="#">13 comments</a>
                </span>
                <span class="date-type">
                <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                </span>
            </div>
            <div class="blog-text">
                <h4>
                <a href="blog.html">Assumenda repud eum veniam</a>
                </h4>
                <p>
                Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
            </div>
            <span>
                <a href="blog.html" class="ready-btn">Read more</a>
            </span>
            </div>
            <!-- Start single blog -->
        </div>
        <!-- End Left Blog-->
        <!-- Start Left Blog -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
            <div class="single-blog-img">
                <a href="blog.html">
                <img src="{{asset('frontend/assets/img/blog/2.jpg')}}" alt="">
                </a>
            </div>
            <div class="blog-meta">
                <span class="comments-type">
                <i class="fa fa-comment-o"></i>
                <a href="#">130 comments</a>
                </span>
                <span class="date-type">
                <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                </span>
            </div>
            <div class="blog-text">
                <h4>
                <a href="blog.html">Explicabo magnam quibusdam.</a>
                </h4>
                <p>
                Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
            </div>
            <span>
                <a href="blog.html" class="ready-btn">Read more</a>
            </span>
            </div>
            <!-- Start single blog -->
        </div>
        <!-- End Left Blog-->
        <!-- Start Right Blog-->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
            <div class="single-blog-img">
                <a href="blog.html">
                <img src="{{asset('frontend/assets/img/blog/3.jpg')}}" alt="">
                </a>
            </div>
            <div class="blog-meta">
                <span class="comments-type">
                <i class="fa fa-comment-o"></i>
                <a href="#">10 comments</a>
                </span>
                <span class="date-type">
                <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                </span>
            </div>
            <div class="blog-text">
                <h4>
                <a href="blog.html">Lorem ipsum dolor sit amet</a>
                </h4>
                <p>
                Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                </p>
            </div>
            <span>
                <a href="blog.html" class="ready-btn">Read more</a>
            </span>
            </div>
        </div>
        <!-- End Right Blog-->
        </div>
    </div>
    </div>
</div><!-- End Blog Section -->

<!-- ======= Suscribe Section ======= -->
<div class="suscribe-area">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
        <div class="suscribe-text text-center">
            <h3>Welcome to our eBusiness company</h3>
            <a class="sus-btn" href="#">Get A quote</a>
        </div>
        </div>
    </div>
    </div>
</div><!-- End Suscribe Section -->

<!-- ======= Contact Section ======= -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container ">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            <h2>Contact us</h2>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- Start contact icon column -->
        <div class="col-md-4">
            <div class="contact-icon text-center">
            <div class="single-icon">
                <i class="bi bi-phone"></i>
                <p>
                Call: +1 5589 55488 55<br>
                <span>Monday-Friday (9am-5pm)</span>
                </p>
            </div>
            </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
            <div class="contact-icon text-center">
            <div class="single-icon">
                <i class="bi bi-envelope"></i>
                <p>
                Email: info@example.com<br>
                <span>Web: www.example.com</span>
                </p>
            </div>
            </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4">
            <div class="contact-icon text-center">
            <div class="single-icon">
                <i class="bi bi-geo-alt"></i>
                <p>
                Location: A108 Adam Street<br>
                <span>NY 535022, USA</span>
                </p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">

        <!-- Start Google Map -->
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
            <div class="form contact-form">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</main>

@endsection