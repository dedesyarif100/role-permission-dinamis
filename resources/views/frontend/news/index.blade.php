@extends('frontend.template.default')

@section('content')

<main id="main">

    <div class="header-bg page-area">
        <div class="container position-relative">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                <div class="header-bottom">
                    <div class="layer2">
                    <h1 class="title2">News</h1>
                    </div>
                    <div class="layer3">
                    <h2 class="title3">Check out our most recent news</h2>
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
                            <div class="left-blog">
                            <h4>interesting news</h4>
                                <div class="recent-post">
                                    @foreach ($popular as $item)
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="{{ route('news.show', $item->slug) }}">
                                            <img src="{{ asset('storage/'.$item->image) }}" alt="" style="border-radius:10px;">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="{{ route('news.show', $item->slug) }}">{{$item->title}}</a></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="blog-details.html">
                                <img src="{{asset('storage/'.$item->image)}}"  style="border-radius: 25px;" alt="">
                                </a>
                            </div>
                            <hr>
                            <div class="blog-text">
                                <h4>
                                <a href="{{ route('news.show', $item->slug) }}">{{$item->title}}</a>
                                </h4>
                                <p>
                                {!! substr($item->description, 0, 150) !!}
                                </p>
                            </div>
                            <span>
                                <a href="{{ route('news.show', $item->slug) }}" class="ready-btn">Read more</a>
                            </span>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="d-flex justify-content-center">
                            {!! $data->links() !!}
                        </div> --}}
                        {{-- {{ $data->links() }} --}}
                        {{-- <div class="blog-pagination">
                            <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link">&lt;</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">&gt;</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection