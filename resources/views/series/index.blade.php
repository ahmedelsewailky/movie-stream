{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Category', 'Category')

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة المسلسلات</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">مسلسلات</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('series.create') }}" class="btn btn-sm btn-outline-success">+ اضافة مسلسل جديد</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            {{-- Table Filter --}}
            <div class="table-filter-element">
                <form action="?" method="get">
                    <div class="dropdown me-3">
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

                    <div class="dropdown me-3">
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

                    <div class="dropdown me-3">
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

                    <div class="align-items-center d-flex ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary me-2">عرض النتائج</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
                    </div>
                </form>
            </div>

            {{-- Series Table --}}
            <section class="p-3">
                <div class="row">
                    @forelse ($series as $ser)
                        <div class="col-md-3 mb-3">
                            <div class="card post-card h-100">
                                <img src="{{ $ser->get_poster() ?? 'https://via.placeholder.com/285x190?text=Poster' }}"
                                    class="card-img-top" alt="series poster">

                                <a href="#" class="episodes-count">
                                    <i class="bx bx-layer"></i>
                                    {{ $ser->episodes->count() }} حلقة
                                </a>

                                <div class="dropdown">
                                    <button class="" data-bs-toggle="dropdown"><i
                                            class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('series.edit', $ser->id) }}" class="dropdown-item">
                                            <i class="bx bx-edit"></i>
                                            تعديل
                                        </a>

                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#confirmDelete{{ $ser->id }}" class="dropdown-item">
                                            <i class="bx bx-trash-alt"></i>
                                            حذف
                                        </a>
                                        <a href="{{ route('series.episodes.create') }}?series_id={{ $ser->id }}" class="dropdown-item">
                                            <i class="bx bx-plus"></i>
                                            اضافة حلقة
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h6 class="fs-6">
                                        <a href="{{ route('series.show', $ser->id) }}">{{ $ser->title }}</a>
                                    </h6>

                                    <div class="post-meta">
                                        <div class="small me-3 meta-category">
                                            <i class="bx text-warning me-1 bxs-folder-open"></i>
                                            {{ $ser->category->name }}
                                        </div>
                                        <div class="small me-3 meta-views">
                                            <i class="bx text-warning me-1 bx-bar-chart-alt-2"></i>
                                            {{ number_format($ser->views) }}
                                        </div>
                                        <div class="small me-3 meta-download ms-auto">
                                            <i class="bx text-warning me-1 bx-download"></i>
                                            0
                                        </div>
                                    </div>

                                    <p>
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">
                            لا توجد منشورات
                        </p>
                    @endforelse
                </div>
            </section>

            {{-- Paginations --}}
            <div class="table-pagination">
                {!! $series->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
