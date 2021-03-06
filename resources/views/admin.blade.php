<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ananta Mitra Karya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        li.nav-item.active {
            background-color: #3452eb;
        }
    </style>
    @yield('css')
</head>

<body class="">
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('menu.index') }}" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Ananta Mitra Karya</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ 'https://ui-avatars.com/api/?name='.Auth::user()->email }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->email }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->email }}</h6>
                            <span>Web Designer</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-block" style="background-color: #f5f5f5">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            @if( auth()->user()->userRole->role_id === 1 )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('role.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Role</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->user_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('user.index') }}">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->menu_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('menu.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Menu</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->submenu_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('submenu.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Sub Menu</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->content_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('content.index') }}">
                        <i class="bi bi-question-circle"></i>
                        <span>Content</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->aboutus_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('aboutus.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>About Us</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->slideshow_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('slideshow.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Slide Show</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->service_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('service.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Service</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->trusted_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('trusted.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Trusted</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->commentclient_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('commentclient.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Comment Client</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->categorynews_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('categorynews.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Category News</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->newsdata_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('newsdata.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>News</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->faq_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('faq.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Faq</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->contactus_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('contactus.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Contact Us</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->information_view )
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('information.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Information</span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->consultation_view )
                <li class="nav-item">
                    @php
                        $consultations = \App\Models\Consultations::where('read_at', null)->count();
                    @endphp
                    <a class="nav-link collapsed" href="{{ route('consultationdata.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Consultation</span>
                        <span> | </span>
                        <span class="badge bg-primary"> {{ $consultations }} </span>
                    </a>
                </li>
            @endif
            @if ( auth()->user()->userRole->role->permission->contactour_view )
                <li class="nav-item">
                    @php
                        $contactOur = \App\Models\ContactOur::where('read_at', null)->count();
                    @endphp
                    <a class="nav-link collapsed" href="{{ route('contactour.index') }}">
                        <i class="bi bi-envelope"></i>
                        <span>Contact Our</span>
                        <span class="d-flex justify-content-end"> | </span>
                        <span class="badge bg-primary"> {{ $contactOur }} </span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
    <main id="main" class="main">
        <div class="pagetitle">
            {{-- <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav> --}}
            @yield('content')
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        let lists = document.querySelectorAll('ul.sidebar-nav li.nav-item');
        lists.forEach(list => {
            if (location.href == list.childNodes[1].href) {
                list.classList.add('active');
            } else {
                list.classList.remove('active');
            }
        });
    </script>
    @yield('js')
</body>
</html>
