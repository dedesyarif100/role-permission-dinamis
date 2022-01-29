@extends('frontend.template.default')

@section('content')
    <main id="main">
        <div class="header-bg page-area">
            <div class="container position-relative">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer3">
                        <h2 class="title3">{{$data->subMenu->name}}</h2>
                        </div>
                        
                        <div class="layer3">
                            <h3 class="title3" style="color:white;">{{$data->subMenu->menu->name}}</h3>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="page-head-blog">
                    <div class="single-blog-page">
                        <form action="#">
                        <div class="search-option">
                            <input type="text" placeholder="Search...">
                            <button class="button" type="submit">
                            <i class="bi bi-search"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                    <div class="single-blog-page">
                        <div class="left-blog">
                        <h4>popular service</h4>
                        <div class="recent-post">
                            <div class="recent-single-post">
                            <div class="post-img">
                                <a href="#">
                                <img src="{{asset('frontend/assets/img/blog/1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="pst-content">
                                <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                            </div>
                            </div>
                            <div class="recent-single-post">
                            <div class="post-img">
                                <a href="#">
                                <img src="{{asset('frontend/assets/img/blog/2.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="pst-content">
                                <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                            </div>
                            </div>
                            <div class="recent-single-post">
                            <div class="post-img">
                                <a href="#">
                                <img src="{{asset('frontend/assets/img/blog/3.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="pst-content">
                                <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                            </div>
                            </div>
                            <!-- End single post -->
                            <!-- start single post -->
                            <div class="recent-single-post">
                            <div class="post-img">
                                <a href="#">
                                <img src="{{asset('frontend/assets/img/blog/4.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="pst-content">
                                <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                            </div>
                            </div>
                            <!-- End single post -->
                        </div>
                        </div>
                        <!-- recent end -->
                    </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        <article class="blog-post-wrapper">
                        <div class="post-thumbnail">
                            <img src="{{asset('frontend/assets/img/blog/6.jpg')}}" alt="" />
                        </div>
                        <div class="post-information">
                            <h2>{{$data->subMenu->name}}</h2>
                            <div class="entry-content">{!!$data->description!!}</div>
                        </div>
                        </article>
                        <div class="clear"></div>
                        <div class="single-post-comments">
                        
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Get Your Free Consultation</h3>
                            <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
                            <form action="{{ route('consultation.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <p>Name <span style="color:red">*</span></p>
                                        <input type="text" name="name" required/>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <p>Email <span style="color:red">*</span></p>
                                        <input type="email" name="email" required/>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <p>Company <span style="color:red">*</span></p>
                                        <input type="text" name="company" required/>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <p>Phone <span style="color:red">*</span></p>
                                        <input type="text" name="phone" class="form-control" required/>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <p>Consultation Type <span style="color:red">*</span></p>
                                        <span style="magin-top:15px; "></span>
                                        <input type="radio" name="consultation_type"> Phone Consultation  &nbsp;&nbsp;
                                        <input type="radio" name="consultation_type"> Office Consultation
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                        <p>Message <span style="color:red">*</span></p>
                                        <textarea id="message-box" name="message" cols="30" rows="10"></textarea>
                                        
                                        @if (Session::has('success'))
                                        <div class="alert alert-success" role="alert">
                                            The form was sent successfully.
                                        </div>
                                        @endif
                                    <input type="submit" value="Send Message" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </main>
@endsection