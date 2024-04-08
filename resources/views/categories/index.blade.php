{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة الأقسام</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الأقسام</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-success">+ اضافة قسم جديد</a>
    </div>

    <div class="row">
        @forelse ($categories->whereNull('parent_id')->get() as $parent)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6>{{ $parent->name }}</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($categories->whereParentId($parent->id)->get() as $category)
                            <div class="d-flex my-3">
                                <h6>
                                    {{ $category->name }}
                                    @if ($parent->id == 1)
                                        <small class="text-muted">({{ $category->movies->count() }})</small>
                                    @elseif ($parent->id == 2)
                                        <small class="text-muted">({{ $category->series->count() }})</small>
                                    @endif
                                </h6>
                                <div class="d-flex ms-auto">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success me-1">تعديل</a>
                                    <a href="javascript:void('0')" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $category->id }}" class="btn btn-danger">حذف</a>
                                </div>
                            </div>
                            @include('categories.confirm-modal')
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
