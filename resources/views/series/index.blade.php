{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Category', 'Category')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">مسلسلات</li>
        </ol>
    </nav>

    <div class="mb-3">
        <a href="{{ route('series.create') }}" class="btn btn-sm btn-primary">اضافة مسلسل جديد</a>
    </div>

    <div class="filter-box">
        <div class="mb-3">
            <h6>ابحث باسم الفيلم</h6>
            <form action="?" method="get" class="d-flex">
                <input type="search" class="form-control" id="search" name="q" value="{{ request()->get('q') ?? false }}">
                <button type="submit" class="btn btn-sm btn-primary">بحث</button>
            </form>
        </div>

        <form action="?" method="get" class="mb-3">
            <h6>فلاتر البحث</h6>

            {{-- Filter by categories --}}
            <div class="dropdown mt-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    عرض حسب القسم
                </button>
                <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                    @foreach (Category::whereParentId(2)->get() as $category)
                        <label for="category-{{ $category->id }}" class="form-label d-flex">
                            <input type="checkbox"
                                id="category-{{ $category->id }}"
                                class="form-check-input me-2"
                                name="category[]"
                                value="{{ $category->id }}"
                                @checked(request()->has('category') && in_array($category->id, request()->get('category')))>
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Filter by language --}}
            <div class="dropdown mt-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    عرض حسب اللغة
                </button>
                <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                    @foreach (DataArray::LANGUAGES as $language)
                        <label for="{{ $language }}" class="form-label d-flex">
                            <input type="checkbox"
                                id="{{ $language }}"
                                class="form-check-input me-2"
                                name="language[]"
                                value="{{ $language }}"
                                @checked(request()->has('language') && in_array($language, request()->get('language')))>
                            {{ $language }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Filter by year --}}
            <div class="dropdown mt-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    حسب التاريخ
                </button>
                <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        <label for="year-{{ $i }}" class="form-check-label d-flex">
                            <input type="radio"
                                id="year-{{ $i }}"
                                class="form-check-input me-2"
                                name="year"
                                value="{{ $i }}"
                                @checked(request()->has('year') && request()->get('year') == $i)>
                            {{ $i }}
                        </label>
                    @endfor
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">عرض النتائج</button>
            <a href="{{ route('movies.index') }}" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
        </form>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>البيان</th>
                <th>الحلقات</th>
                <th>المشاهدات</th>
                <th>التحميلات</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($series as $series)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="{{ $series->get_poster() ?? 'https://via.placeholder.com/120x80' }}" width="120" height="70" alt="{{ $series->title }}">
                            </div>
                            <div class="flex-grow-1">
                                <h6><a href="{{ route('series.show', $series->id) }}">{{ $series->title }}</a></h6>
                                <div class="d-flex">
                                    <div class="meta-category">
                                        <i class="bx bx-folder"></i>
                                        {{ $series->category->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $series->episodes->count() }}</td>
                    <td>{{ number_format($series->views) }}</td>
                    <td>0</td>
                    <td>
                        <a href="{{ route('series.edit', $series->id) }}" class="btn btn-sm btn-success">تعديل</a>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $series->id }}" class="btn btn-sm btn-danger">حذف</a>
                        <a href="{{ route('series.episodes.create', $series->id) }}" class="btn btn-sm btn-primary">اضافة حلقة</a>
                    </td>
                </tr>
                @include('series.confirm-modal')
            @empty
                <tr>
                    <td colspan="6" class="text-center">لا توجد منشورات</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- {!! $series->links('pagination::bootstrap-5') !!} --}}
@endsection
