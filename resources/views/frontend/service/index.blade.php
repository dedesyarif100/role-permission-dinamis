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
                        <h2 class="title3">{{$data->title}}</h2>
                        </div>
                        
                        <div class="layer3">
                            {{-- <h3 class="title3" style="color:white;">{{$data->subMenu->menu->name}}</h3> --}}
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

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            
                            <article class="blog-post-wrapper">
                            <div class="post-thumbnail">
                                <img src="{{asset('storage/'. $data->images)}}" alt="" style="border-radius: 20px" />
                            </div>
                            <div class="post-information">
                                <h2>{{$data->title}}</h2>
                                <div class="entry-content">{!!$data->long_description!!}</div>
                            </div>
                            </article>
                            <div class="clear"></div>
                            <div class="single-post-comments">
                            
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </main>
@endsection