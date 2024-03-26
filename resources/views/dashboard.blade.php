{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Breadcrumb --}}
@section('breadcrumb')
    <h6>الرئيسية</h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">لوحة التحكم
            </li>
        </ol>
    </nav>
@endsection

{{-- Page content --}}
@section('content')
    <section class="row my-3">
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
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النصs</p>
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
    </section>

    <section class="section">
        <div class="section-title py-3 mb-1">
            <h6>
                <i class="bx bx-trending-up me-2"></i>
                الأعلي مشاهدة
            </h6>
        </div>
        <div class="section-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>البيان</th>
                        <th>القسم</th>
                        <th>المشاهدات</th>
                        <th>تاريخ الإضافة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>مسلسل لحظات حرجة الجزء الثاني</td>
                        <td>مسلسلات عربية</td>
                        <td>{{ number_format(85656) }}</td>
                        <td>منذ شهر</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>الحلقة 15 من مسلسل جعفر العمدة</td>
                        <td>مسلسلات عربية</td>
                        <td>{{ number_format(85656) }}</td>
                        <td>منذ اسبوع</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>البيان</th>
                        <th>القسم</th>
                        <th>المشاهدات</th>
                        <th>تاريخ الإضافة</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection

{{-- Includ css file for apexchart library --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/apexchart/apexcharts.css') }}">
@endsection

{{-- Includ required js file for apexchart library and firing code --}}
@section('js')
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
@endsection
