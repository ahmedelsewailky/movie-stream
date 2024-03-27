{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة المسلسلات</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('series.index') }}">مسلسلات</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('series.show', $series->id) }}">{{ $series->title }}</a></li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('series.episodes.create') }}?series_id={{ $series->id }}" class="btn btn-sm btn-outline-success">+ اضافة حلقة جديد</a>
    </div>

    <div class="row">
        @foreach ($series->episodes as $episode)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body d-flex align-items-center">
                        <h6>
                            <a href="{{ route('series.episodes.edit', $episode->id) }}" class="text-decoration-underline">
                                الحلقة رقم {{ $episode->episode }}
                            </a>
                        </h6>
                        <div class="d-flex ms-auto">
                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#confirmDelete{{ $episode->id }}"
                                class="btn btn-sm btn-danger ms-1">حذف</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('series.episodes.confirm-modal')
        @endforeach
    </div>
@endsection
