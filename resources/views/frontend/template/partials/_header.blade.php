<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex">

        <div class="logo">
            <h1><a href="/"><span>A</span>nanta Mitra Karya</a></h1>
        </div>
        @php
            $dataMenu = getMenu();
        @endphp
        <nav id="navbar" class="navbar" style="margin-left:50px;">
            <ul>
                @foreach ($dataMenu as $item)
                <li class="dropdown"><a href="#"><span>{{$item->name}}</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        @foreach($item->subMenu as $itemSecond)
                        <li><a href="{{ route('services.show', [$itemSecond->menu_id, $itemSecond->content->slug]) }}" target="_blank">{{$itemSecond->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            <ul>
                <li class="dropdown"><a href="#"><span>News</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        <li><a href="{{ route('news.list') }}" target="_blank">All</a></li>
                        <li><a href="" target="_blank">Company Establishment & Tax</a></li>
                        <li><a href="" target="_blank">Real Estate</a></li>
                        <li><a href="" target="_blank">Relocation</a></li>
                        <li><a href="" target="_blank">Videos</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>