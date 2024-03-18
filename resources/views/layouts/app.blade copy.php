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
    <div id="app">
        <div class="dashboard-wrap-content">
            <nav class="navbar navbar-expand-md navbar-light dashboard-nav-menu">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <img src="{{ asset('logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link active" target="_blank">عرض
                                    الموقع</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" @class(['nav-link', 'active' => Request::routeIs('categories.*')])>الأقسام</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('actors.index') }}" @class(['nav-link', 'active' => Request::routeIs('actors.*')])>الممثلين</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('movies.index') }}" @class(['nav-link', 'active' => Request::routeIs('movies.*')])>الافلام</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('series.index') }}" @class(['nav-link', 'active' => Request::routeIs('series.*')])>مسلسلات</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('tvshows.index') }}" @class(['nav-link', 'active' => Request::routeIs('tvshows.*')])>برامج
                                    تلفزيونية</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                            <i class="bx bx-user"></i>
                                            الملف الشخصي
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="bx bx-log-out"></i>
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="container">
                <div class="row">
                    {{-- Visitings --}}
                    <div class="col-md-3 offset-md-3">
                        <div class="card static-card visits-static-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-lg bx-trending-up"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>عدد الزيارات</h6>
                                        <p>{{ number_format(3500) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Downloads --}}
                    <div class="col-md-3">
                        <div class="card static-card downloads-static-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-lg bx-download"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>عدد التحميلات</h6>
                                        <p>{{ number_format(857453) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Watchs --}}
                    <div class="col-md-3">
                        <div class="card static-card views-static-card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-lg bx-tv"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>عدد المشاهدات</h6>
                                        <p>{{ number_format(740852) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
    @include('sweetalert::alert')
</body>

</html>
