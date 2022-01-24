@extends('frontend.template.default')

@section('content')
    <main id="main">

        <!-- ======= Blog Header ======= -->
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
        </div><!-- End Blog Header -->

        <!-- ======= Blog Page ======= -->
        <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="page-head-blog">
                <div class="single-blog-page">
                    <!-- search option start -->
                    <form action="#">
                    <div class="search-option">
                        <input type="text" placeholder="Search...">
                        <button class="button" type="submit">
                        <i class="bi bi-search"></i>
                        </button>
                    </div>
                    </form>
                    <!-- search option end -->
                </div>
                <div class="single-blog-page">
                    <!-- recent start -->
                    <div class="left-blog">
                    <h4>popular service</h4>
                    <div class="recent-post">
                        <!-- start single post -->
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
                        <!-- End single post -->
                        <!-- start single post -->
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
                        <!-- End single post -->
                        <!-- start single post -->
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
            <!-- End left sidebar -->
            <!-- Start single blog -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- single-blog start -->
                    <article class="blog-post-wrapper">
                    <div class="post-thumbnail">
                        <img src="{{asset('frontend/assets/img/blog/6.jpg')}}" alt="" />
                    </div>
                    <div class="post-information">
                        <h2>{{$data->subMenu->name}}</h2>
                        <div class="entry-content">{{$data->description}}</div>
                    </div>
                    </article>
                    <div class="clear"></div>
                    <div class="single-post-comments">
                    
                    <div class="comment-respond">
                        <h3 class="comment-reply-title">Get Your Free Consultation</h3>
                        <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
                        <form action="#">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                            <p>Name *</p>
                            <input type="text" />
                            </div>
                            <div class="col-lg-4 col-md-4">
                            <p>Email *</p>
                            <input type="email" />
                            </div>
                            <div class="col-lg-4 col-md-4">
                            <p>Website</p>
                            <input type="text" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                            <p>Website</p>
                            <textarea id="message-box" cols="30" rows="10"></textarea>
                            <input type="submit" value="Post Comment" />
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <!-- single-blog end -->
                </div>
                </div>
            </div>
            </div>
        </div>
        </div><!-- End Blog Page -->

    </main>
@endsection