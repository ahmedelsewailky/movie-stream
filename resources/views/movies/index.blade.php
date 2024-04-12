{{-- Extend master app layout --}}
@extends('layouts.app')

@use('App\Models\Category', 'Category')

{{-- Search form --}}
@section('search')
    <form action="?" method="get">
        <input type="search" class="form-control" id="search" name="q" value="{{ request()->has('q') ? request()->get('q') : '' }}" placeholder="ابحث داخل الأفلام">
        <i class="bx bx-search"></i>
    </form>
@endsection

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة الأفلام</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">لوحة التحكم</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">قائمة الأفلام</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('movies.create') }}" class="btn btn-sm btn-outline-success">+ اضافة فيلم جديد</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            {{-- Table Filter --}}
            <div class="table-filter-element">
                <form action="?" method="get">
                    <div class="dropdown me-md-3">
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

                    <div class="dropdown me-md-3">
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

                    <div class="dropdown me-md-3">
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

                    <div class="align-items-md-center d-flex ms-md-auto justify-content-end mt-3">
                        <button type="submit" class="btn btn-sm btn-primary me-2">عرض النتائج</button>
                        <a href="?" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
                    </div>
                </form>
            </div>

            {{-- Movies Table --}}
            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th>البيان</th>
                            <th>المشاهدات</th>
                            <th>التحميلات</th>
                            <th>الخيارات</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @forelse ($movies as $movie)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="{{ $movie->get_poster() ?? 'https://via.placeholder.com/120x80' }}"
                                                width="120" height="70" alt="{{ $movie->title }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="">{{ $movie->title }}</a>
                                            </h6>
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
                                <td>
                                    <i class="bx bx-bar-chart-alt-2 me-1"></i>
                                    {{ number_format($movie->views) }}
                                </td>
                                <td>
                                    <i class="bx bx-download"></i>
                                    0
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="" data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('movies.edit', $movie->id) }}" class="dropdown-item">
                                                <i class="bx bx-edit"></i>
                                                تعديل
                                            </a>
    
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#confirmDelete{{ $movie->id }}" class="dropdown-item">
                                                <i class="bx bx-trash-alt"></i>
                                                حذف
                                            </a>
                                        </div>
                                    </div>
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
            </div>

            {{-- Paginations --}}
            <div class="table-pagination">
                {!! $movies->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
