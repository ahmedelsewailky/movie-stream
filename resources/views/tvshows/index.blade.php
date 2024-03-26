{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Category', 'Category')

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة البرامج التلفزيونية</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">برامج تلفزيونية</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('tvshows.create') }}" class="btn btn-sm btn-outline-success">+ اضافة برنامج جديد</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            {{-- Table Filter --}}
            <div class="table-filter-element">
                <form action="?" method="get">
                    <div class="dropdown me-2">
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

                    <div class="dropdown me-2">
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
                        <a href="{{ route('tvshows.index') }}" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
                    </div>
                </form>
            </div>

            {{-- Series Table --}}
            <table class="table table-hover table-borderless">
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
                    @forelse ($tvshows as $tvshow)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="{{ $tvshow->get_poster() ?? 'https://via.placeholder.com/120x80' }}"
                                            width="120" height="70" alt="{{ $tvshow->title }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6><a href="{{ route('tvshows.show', $tvshow->id) }}">{{ $tvshow->title }}</a>
                                        </h6>

                                    </div>
                                </div>
                            </td>
                            <td>{{ $tvshow->episodes->count() }}</td>
                            <td>
                                <i class="bx bx-bar-chart-alt-2"></i>
                                {{ number_format($tvshow->views) }}
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
                                        <a href="{{ route('tvshows.edit', $tvshow->id) }}" class="dropdown-item">
                                            <i class="bx bx-edit"></i>
                                            تعديل
                                        </a>

                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#confirmDelete{{ $tvshow->id }}" class="dropdown-item">
                                            <i class="bx bx-trash-alt"></i>
                                            حذف
                                        </a>
                                        <a href="{{ route('tvshows.episodes.create', $tvshow->id) }}"
                                            class="dropdown-item">
                                            <i class="bx bx-plus"></i>
                                            اضافة حلقة
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('tvshows.confirm-modal')
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">لا توجد منشورات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
