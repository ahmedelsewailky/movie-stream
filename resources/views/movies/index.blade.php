{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Category', 'Category')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الأفلام</li>
        </ol>
    </nav>

    <div class="mb-3">
        <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary">اضافة فيلم جديد</a>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <h6>ابحث باسم الفيلم</h6>
                <form action="?" method="get" class="d-flex">
                    <input type="search" class="form-control" id="search" name="q"
                        value="{{ request()->get('q') ?? false }}">
                    <button type="submit" class="btn btn-sm btn-primary">بحث</button>
                </form>
            </div>

            <div class="filter-form-card">
                <form action="?" method="get" class="mb-3">
                    <h6>فلاتر البحث</h6>

                    {{-- Filter by categories --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside"
                            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            عرض حسب القسم
                        </button>
                        <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                            @foreach (Category::whereParentId(1)->get() as $category)
                                <label for="category-{{ $category->id }}" class="form-label d-flex">
                                    <input type="checkbox" id="category-{{ $category->id }}" class="form-check-input me-2"
                                        name="category[]" value="{{ $category->id }}" @checked(request()->has('category') && in_array($category->id, request()->get('category')))>
                                    {{ $category->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Filter by language --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside"
                            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            عرض حسب اللغة
                        </button>
                        <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                            @foreach (DataArray::LANGUAGES as $language)
                                <label for="{{ $language }}" class="form-label d-flex">
                                    <input type="checkbox" id="{{ $language }}" class="form-check-input me-2"
                                        name="language[]" value="{{ $language }}" @checked(request()->has('language') && in_array($language, request()->get('language')))>
                                    {{ $language }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Filter by year --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside"
                            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            حسب التاريخ
                        </button>
                        <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                            @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                <label for="year-{{ $i }}" class="form-check-label d-flex">
                                    <input type="radio" id="year-{{ $i }}" class="form-check-input me-2"
                                        name="year" value="{{ $i }}" @checked(request()->has('year') && request()->get('year') == $i)>
                                    {{ $i }}
                                </label>
                            @endfor
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">عرض النتائج</button>
                    <a href="{{ route('movies.index') }}" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
                </form>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6>إجمالي الأفلام</h6>
                            <p>{{ number_format(\App\Models\Movie::get()->count()) }} /فيلم</p>
                        </div>

                        <div class="col-md-8">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>البيان</th>
                        <th>المشاهدات</th>
                        <th>التحميلات</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="{{ $movie->get_poster() ?? 'https://via.placeholder.com/120x80' }}"
                                            width="120" height="70" alt="{{ $movie->title }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>{{ $movie->title }}</h6>
                                        <div class="d-flex">
                                            <div class="meta-category">
                                                <i class="bx bx-folder"></i>
                                                {{ $movie->category->name }}
                                            </div>

                                            <div class="meta-author">
                                                <i class="bx bx-user"></i>
                                                {{ $movie->user->name }}
                                            </div>

                                            <div class="meta-language">
                                                <i class="bx bx-globe"></i>
                                                {{ $movie->language }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($movie->views) }}</td>
                            <td>0</td>
                            <td>
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-success">تعديل</a>
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#confirmDelete{{ $movie->id }}"
                                    class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                        @include('movies.confirm-modal')
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">لا توجد منشورات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $movies->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

@php
    $categories = Category::whereParentId(1)->get();
        $data = collect([]);
        foreach ($categories as $category) {
            $data->push($category->movies->count());
        }
@endphp

@section('js')
    <script src="{{ asset('assets/libs/apexchart/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            chart: {
                type: 'bar',
            },
            series: [{
                name: 'sales',
                data: {!! $data !!}
            }],
            xaxis: {
                categories: {!! Category::whereParentId(1)->pluck('name') !!}
            },
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#255aee',
                    shadeTo: 'light',
                    shadeIntensity: 0.65
                }
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
