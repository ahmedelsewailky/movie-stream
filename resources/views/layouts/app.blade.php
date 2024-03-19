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
        <div class="dashboard-wrapper">
            <aside class="sidebar">
                <div class="sidebar-inner">
                    <div class="sidebar-logo">
                        <a href="">{{ env('APP_NAME') }}</a>
                    </div>

                    <div class="sidebar-author">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/45" width="45" height="45"
                                    class="rounded-circle me-3" alt="{{ auth()->user()->name }}">
                            </div>
                            <div class="flex-grow-1">
                                <a href="">{{ auth()->user()->name }}</a>
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-menu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" @class(['nav-link', 'active' => Request::routeIs('dashboard')])>
                                    <i class="bx bxs-dashboard"></i>
                                    الرئيسية
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                                    <i class="bx bx-globe"></i>
                                    عرض الموقع
                                </a>
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
                    </div>
                </div>
            </aside>

            <main class="main-content">
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
                    <div class="col-lg-4">
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
                </div>
            </main>
        </div>
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
    </script>
</body>

</html>
