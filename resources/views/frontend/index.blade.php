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

            @foreach ($slideshow as $item)
            <div class="carousel-item {{ ($item->is_active) ? 'active' : '' }}" style="background-image: url({{ asset('storage/'.$item->image) }})">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">Ananta Mitra Karya</h2>
                    <h6 style="color: white; margin-left:50px;margin-right:50px;" class="animate__animated animate__fadeInUp">{{$item->description}}</h6>
                    <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                </div>
                </div>
            </div>
            @endforeach

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
                @foreach ($service as $item)
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="about-move" style="padding-bottom:10px;">
                        <div class="services-details" style="background: rgba(0, 0, 0, 0.8); border-radius:25px;">
                            <div class="single-services">
                                <img src="{{asset('storage/'.$item->image)}}" style="width: 30%; border-radius:100px;" class="" alt="">
                                <br>
                                <h4 style="color: white;">{{$item->title}}</h4>
                                <p style="color:white; padding: 0px 10px 30px 10px;">
                                    {{ $item->short_description }}
                                </p>
                                <a href="{{route('service_single.show', $item->slug)}}" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                    <a href="#">
                        <img src="{{asset('storage/'.$about->image)}}" alt="">
                    </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                    <a href="#">
                        <h4 class="sec-head">{{$about->title}}</h4>
                    </a>
                    {!! $about->description !!}
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
        <img src="{{asset('frontend/assets/images/ruang-tamu.jpg')}}" alt="" class="img-fluid">
    </div>
    <div class="col-lg-6 work-right-text d-flex align-items-center">
        <div class="px-5 py-5 py-lg-0">
        <h5>Welcome to Ananta Mitra Karya, Indonesia’s Most Trusted Visa & Business Consultancy. We are proud to be the trendsetters in what we do, simplifying and improving expatriate services..</h5>
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
        <div class="container ">
            <div class="row">
            <!-- Start contact icon column -->
                <div class="col-md-12">
                    <section class="customer-logos slider">
                        <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
                        <div class="slide"><img src="http://www.webcoderskull.com/img/logo.png"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
                        <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
                    </section>
                </div>
            </div>
                <hr>
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

        <div class="col-md-6">
            <iframe src="https://maps.google.com/maps?q=ananta%20mitra%20karya&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-md-6">
            <div class="form contact-form">
            <form action="{{route('contact_our.store')}}" method="post" role="form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    Your message has been sent. Thank you!
                </div>
                @endif
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-block btn-info">Send Message</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</main>

@endsection

@section('js')

<script type="text/javascript">

</script>
@endsection