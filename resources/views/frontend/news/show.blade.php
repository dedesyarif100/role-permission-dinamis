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
                                <h1 class="title2">News Details </h1>
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
                                            <img src="{{asset('storage/'.$item->image)}}" alt="" style="border-radius:10px;">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="{{ route('news.show', $item->slug) }}"> {{$item->title}}</a></p>
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <article class="blog-post-wrapper">
                                <div class="post-thumbnail">
                                    <img src="{{ asset('storage/'. $data->image) }}" alt="" style="border-radius:25px;" />
                                </div>
                                <div class="post-information">
                                    <h2>{{$data->title}}</h2>
                                    <div class="entry-meta">
                                        <span class="author-meta"><i class="bi bi-person"></i> <a href="#">{{$data->user->name}}</a></span>
                                        <span><i class="bi bi-clock"></i> {{ date('d, M Y', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <div class="entry-content">
                                        {!! $data->description !!}
                                    </div>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection