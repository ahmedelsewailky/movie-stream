{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <div class="row">
        @forelse ($categories->whereNull('parent_id')->get() as $parent)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex">
                        <h6>{{ $parent->name }}</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($categories->whereParentId($parent->id)->get() as $category)
                            <div class="d-flex my-3">
                                <h6>{{ $category->name }}</h6>
                                <div class="d-flex ms-auto">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success me-1">تعديل</a>
                                    <a href="javascript:void('0')" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $category->id }}" class="btn btn-sm btn-danger">حذف</a>
                                </div>
                            </div>
                            @include('dashboard.categories.confirm-modal')
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
