<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            <h1><a href="/"><span>A</span>nanta Mitra Karya</a></h1>
        </div>
        @php
            $dataMenu = getMenu();
        @endphp
        <nav id="navbar" class="navbar">
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
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>