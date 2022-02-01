<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            {{-- <h1><a href="/"><span>A</span>nanta Mitra Karya</a></h1> --}}
            <a href="/"><img src="{{ asset('frontend/assets/images/Logo.png') }}" alt="Logo"></a>
        </div>
        @php
            $dataMenu = getMenu();
            $dataCategoryNews = getCategoryNews();
        @endphp
        <nav id="navbar" class="navbar" style="margin-left:50px;">
            <ul>
                @foreach ($dataMenu as $item)
                <li class="dropdown"><a href="#" class="nav-link"><span>{{$item->name}}</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        @foreach($item->subMenu as $itemSecond)
                            @if ($itemSecond->content)
                            <li><a href="{{ route('services.show', $itemSecond->content->slug) }}" target="_blank">{{$itemSecond->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            <ul>
                <li class="dropdown"><a href="#"><span>News</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        @foreach ($dataCategoryNews as $item)
                        <li><a href="{{ route('news.index', $item->slug) }}" target="_blank">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('faqs.show') }}">FAQ</a></li>
            </ul>
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('about.show') }}">About</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>