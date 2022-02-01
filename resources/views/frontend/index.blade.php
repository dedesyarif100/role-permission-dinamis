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
                                <a href="{{ route('service_single.show', $item->slug) }}" class="btn btn-default scrollto animate__animated animate__fadeInUp" style="background-color:#3ec1d5;">Find Out More</a>
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
                <br>
                <a href="">Find Out More..</a>
            </div>
        </div>
        </div>
    </div>

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
    </div>


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
                        <div class="col-md-12">
                            <section class="customer-logos slider">
                                @foreach($trusted as $item)
                                <div class="slide"><img src="{{asset('storage/'. $item->image)}}"></div>
                                @endforeach
                            </section>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonials" class="testimonials">
        <div class="container">
            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">
                    @foreach ($comment_client as $item)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('storage/'. $item->image)}}" class="testimonial-img" alt="">
                            <h3>{{$item->name}}</h3>
                            <h4>{{$item->title}}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$item->message}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

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
                    @foreach ($news as $item)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="{{ route('news.show', $item->slug) }}">
                                <img src="{{ asset('storage/'.$item->image) }}" alt="">
                                </a>
                            </div>
                            <div class="blog-text">
                                <hr>
                                <h4>
                                    <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                                </h4>
                            </div>
                            <span>
                                <a href="{{ route('news.show', $item->slug) }}" class="ready-btn">Read more</a>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                @foreach ($service as $item)
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="suscribe-text text-center">
                        <p style="color:white;font-size:20px;">{{$item->title}}</p>
                        <a class="sus-btn" style="margin-left:0px; !important" href="{{ route('service_single.show', $item->slug) }}">Find Out More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

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