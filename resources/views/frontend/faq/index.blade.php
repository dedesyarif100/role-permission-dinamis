@extends('frontend.template.default')

@section('content')

<main id="main">
    
    <div class="header-bg-about page-area">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content text-center">
                        <div class="header-bottom">
                            <div class="layer2">
                                <h1 class="title2">FAQ </h1>
                            </div>
                            <div class="layer3">
                                <h2 class="title3">Ananta Mitra Karya</h2>
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
                            <div class="single-blog">
                                <div class="blog-text">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        @foreach($data as $item)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne{{$item->id}}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$item->id}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$item->id}}">
                                                {{$item->title}}
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapse{{$item->id}}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne{{$item->id}}">
                                                <div class="accordion-body">
                                                {{$item->description}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection