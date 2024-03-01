{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Category', 'Category')

{{-- Page content --}}
@section('content')
    <div class="row">
        {{-- Visitings --}}
        <div class="col-md-3">
            <div class="card">
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
            <div class="card">
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
            <div class="card">
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


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6>اجمالي المنشورات</h6>
                    <p>{{ number_format(1350) }}</p>

                    <div id="pie"></div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="bar"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>عدد المشاركات</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\User::get() as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td title="فيلم:{{ $user->movies->count() }} , مسلسل:{{ $user->series->count() }} , {{ $user->tvshows->count() }}:برنامج">
                                        {{ $user->movies->count() + $user->series->count() + $user->tvshows->count() }}
                                    </td>
                                    <td>نشط الآن</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $totalMovies = \App\Models\Movie::get()->count();
    $totalSeries = \App\Models\Series::get()->count();
    $totalTvShows = \App\Models\Tvshow::get()->count();
@endphp

@section('js')
    <script src="{{ asset('assets/libs/apexchart/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [{{ $totalMovies }}, {{ $totalSeries }}, {{ $totalTvShows }}],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: {!! Category::whereNull('parent_id')->pluck('name') !!},
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie"), options);
        chart.render();



        var options = {
            series: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val + "%";
                    }
                }

            },
            title: {
                text: 'Monthly Inflation in Argentina, 2002',
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#bar"), options);
        chart.render();
    </script>
@endsection
