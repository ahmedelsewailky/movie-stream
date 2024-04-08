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
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الأقسام</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل بيانات قسم</li>
                </ol>
            </nav>
        </div>
    </div>

    <form action="{{ route('categories.update', $category->id) }}" method="post" class="border border-2 border-dashed ms-auto mt-5 p-4 translate-middle-x w-50">
        @csrf
        @method('PUT')
        {{-- Category Name --}}
        <div class="mb-3">
            <label for="category_name" class="form-label">اسم القسم</label>
            <input type="text" name="name" id="category_name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $category->name }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">رابط الوصول</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug') ?? $category->slug }}">
            @error('slug')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Select Form --}}
        <div class="mb-3">
            <label for="parent_id" class="form-label">القسم الرئيسي</label>
            <select name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                <option value="" hidden>-- اختار --</option>
                @foreach (\App\Models\Category::whereNull('parent_id')->get() as $cate)
                    <option value="{{ $cate->id }}" @selected($cate->id == $category->parent_id)>
                        {{ $cate->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-dark">
                <i class="bx bx-save"></i>
                حفظ التغيرات
            </button>
        </div>
    </form>
@endsection
