{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Search form --}}
@section('search')
    <form action="{{ route('tvshows.index') }}" method="get">
        <input type="search" class="form-control" id="search" name="q" value="{{ request()->has('q') ? request()->get('q') : '' }}" placeholder="ابحث داخل العروض التلفزيونية">
        <i class="bx bx-search"></i>
    </form>
@endsection

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة البرامج التلفزيونية</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tvshows.index') }}">برامج تلفزيونية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tvshows.show', $tvshow->id) }}">{{ $tvshow->title }}</a>
                    </li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('tvshows.episodes.create') }}?tvshow_id={{ $tvshow->id }}" class="btn btn-sm btn-outline-success">+ اضافة برنامج جديد</a>
    </div>

    <div class="row">
        @forelse ($tvshow->episodes as $episode)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body d-flex">
                        <h6>
                            <a href="{{ route('tvshows.episodes.edit', $episode->id) }}" class="text-decoration-underline">
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
            @include('tvshows.episodes.confirm-modal')
        @empty
            <p class="text-center">لا توجد حلقات</p>
        @endforelse
    </div>
@endsection
