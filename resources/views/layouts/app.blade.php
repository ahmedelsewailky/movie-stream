<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}">
    <!-- Boxicons Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}">
    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @yield('css')
</head>

<body>
    <div class="dashboard-wrapper">
        <aside class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <a href="">
                        <img src="{{ asset('logo.png') }}" alt="App Logo">
                    </a>
                </div>

                <div class="sidebar-menu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" @class(['nav-link', 'active' => Request::routeIs('dashboard')])>
                                <i class="bx bxs-dashboard"></i>
                                لوحة التحكم
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link" target="_blank">
                                <i class="bx bx-globe"></i>
                                عرض الموقع
                            </a>
                        </li>

                        <h6>اساسي</h6>

                        <li class="nav-item">
                            <a href="{{ route('movies.index') }}" @class(['nav-link', 'active' => Request::routeIs('movies.*')])>
                                <i class="bx bx-movie-play"></i>
                                الافلام
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('series.index') }}" @class(['nav-link', 'active' => Request::routeIs('series.*')])>
                                <i class="bx bx-movie"></i>
                                مسلسلات
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('tvshows.index') }}" @class(['nav-link', 'active' => Request::routeIs('tvshows.*')])>
                                <i class="bx bx-camera-movie"></i>
                                برامج تلفزيونية
                            </a>
                        </li>

                        <h6>جداول</h6>

                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" @class(['nav-link', 'active' => Request::routeIs('categories.*')])>
                                <i class="bx bx-category"></i>
                                الأقسام
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('actors.index') }}" @class(['nav-link', 'active' => Request::routeIs('actors.*')])>
                                <i class="bx bx-group"></i>
                                الممثلين
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="main-content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="search-form">
                            @yield('search')
                        </div>

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://via.placeholder.com/32" width="32" height="32"
                                        class="rounded-circle me-2" alt="{{ auth()->user()->name }}">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            الملف الشخصي
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="bx bx-log-out me-2"></i>
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </main>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
    @include('sweetalert::alert')
</body>

</html>
