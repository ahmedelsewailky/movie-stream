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
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="page-breadcrumb">
                                    <h6>الرئيسية</h6>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item mt-1 active" aria-current="page">الصفحة الرئيسية
                                            </li>
                                        </ol>
                                    </nav>
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
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

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

                        <div class="col-lg-4">
                            <div class="card static-card posts-chart-card">
                                <div class="card-body p-0">
                                    <div class="static-card-title">
                                        <i class="bx bx-bar-chart"></i>
                                        إجمالي المنشورات
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h5>{{ number_format(4500) }}</h5>
                                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                                                من
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

                        <div class="col-lg-4">
                            <div class="card static-card downloads-chart-card">
                                <div class="card-body p-0">
                                    <div class="static-card-title">
                                        <i class="bx bx-bar-chart"></i>
                                        مرات التحميل
                                    </div>
                                    <h5>{{ number_format(18765) }}</h5>
                                    <div id="downloads-chart"></div>
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
            colors: ['#009688', '#4caf50', '#cddc39'],
            stroke: {
                colors: ['#322e49']
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

        var options = {
            series: [{
                data: [{
                        x: '2008',
                        y: [2800, 4500]
                    },
                    {
                        x: '2009',
                        y: [3200, 4100]
                    },
                    {
                        x: '2010',
                        y: [2950, 7800]
                    },
                    {
                        x: '2011',
                        y: [3000, 4600]
                    },
                    {
                        x: '2012',
                        y: [3500, 4100]
                    },
                    {
                        x: '2013',
                        y: [4500, 6500]
                    },
                    {
                        x: '2014',
                        y: [4100, 5600]
                    },
                    {
                        x: '2015',
                        y: [7600, 6400]
                    },
                    {
                        x: '2016',
                        y: [4100, 5600]
                    }
                ]
            }],
            chart: {
                height: 150,
                type: 'rangeBar',
                zoom: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                },
            },
            plotOptions: {
                bar: {
                    isDumbbell: true,
                    columnWidth: 2,
                    dumbbellColors: [
                        ['#CDDC39', '#009688']
                    ]
                }
            },
            legend: {
                show: false,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    type: 'vertical',
                    gradientToColors: ['#CDDC39', '#009688'],
                    inverseColors: true,
                    stops: [0, 100]
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#downloads-chart"), options);
        chart.render();
    </script>
</body>

</html>
