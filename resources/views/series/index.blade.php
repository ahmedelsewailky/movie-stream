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
        <a href="{{ route('series.create') }}" class="btn btn-sm btn-primary">اضافة مسلسل جديد</a>
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
                                <h6>{{ $series->title }}</h6>
                                <div class="d-flex">
                                    <div class="meta-category">
                                        <i class="bx bx-folder"></i>
                                        {{ $series->category->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>53</td>
                    <td>{{ number_format($series->views) }}</td>
                    <td>0</td>
                    <td>
                        <a href="{{ route('series.edit', $series->id) }}" class="btn btn-sm btn-success">تعديل</a>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $series->id }}" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
                @include('series.confirm-modal')
            @empty
                <tr>
                    <td colspan="5" class="text-center">لا توجد منشورات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
