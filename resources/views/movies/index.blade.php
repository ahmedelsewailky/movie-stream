{{-- Extend master app layout --}}
@extends('layouts.app')

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
                                <img src="{{ $movie->get_movie_poster() }}" width="120" height="70" alt="{{ $movie->title }}">
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
                                        {{ DataArray::LANGUAGES[$movie->language] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ number_format($movie->views) }}</td>
                    <td>0</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-success">تعديل</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger">حذف</a>
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
@endsection
