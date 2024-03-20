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

    <link rel="stylesheet" href="{{ asset('assets/libs/apexchart/apexcharts.css') }}">

    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    @yield('css')
</head>

<body>
    <div id="app" class="dashboard">
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
                            <a href="{{ url('/') }}" class="nav-link" target="_blank">عرض
                                الموقع</a>
                        </li>

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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-2">
                            <i class="bx bx-sm bx-home"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="page-breadcrumb">
                                <h6>الرئيسية</h6>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">الصفحة الرئيسية</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success">
                        <i class="bx bx-download"></i>
                        عرض التقرير
                    </button>
                </div>

                <div class="row my-3">
                    <div class="col-lg-5">
                        <div class="card static-card visits-chart-card">
                            <div class="card-body p-0">
                                <div class="static-card-title">
                                    <i class="bx bx-bar-chart"></i>
                                    إجمالي الزيارات
                                </div>
                                <h5>{{ number_format(8509850) }}</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص العربى</p>
                                <div id="visits-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card static-card posts-chart-card">
                            <div class="card-body p-0">
                                <div class="static-card-title">
                                    <i class="bx bx-bar-chart"></i>
                                    إجمالي المنشورات
                                </div>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5>{{ number_format(4500) }}</h5>
                                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                            مولد
                                            النص العربى</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div id="posts-chart"></div>
                                    </div>
                                </div>
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="count-item">
                                            <span>فيلم</span>
                                            <strong>315</strong>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count-item">
                                            <span>مسلسل</span>
                                            <strong>45</strong>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="count-item">
                                            <span>برنامج</span>
                                            <strong>25</strong>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Apexchart Js -->
    <script src="{{ asset('assets/libs/apexchart/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [{
                name: 'Visits Chart',
                data: [31, 40, 28, 51, 42, 109, 100]
            }],
            chart: {
                height: 100,
                type: 'area',
                sparkline: {
                    enabled: true
                }
            },
            colors: ['#009688'],
        };
        var chart = new ApexCharts(document.querySelector("#visits-chart"), options);
        chart.render();

        var options = {
            series: [44, 55, 13],
            chart: {
                width: 150,
                type: 'pie',
            },
            legend: {
                show: false
            },
            labels: ['فيلم', 'مسلسل', 'برنامج'],
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'top'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#posts-chart"), options);
        chart.render();
    </script>
</body>

</html>
