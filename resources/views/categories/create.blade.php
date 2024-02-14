{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الأقسام</a></li>
            <li class="breadcrumb-item active" aria-current="page">اضافة قسم جديد</li>
        </ol>
    </nav>

    <form action="{{ route('categories.store') }}" method="post" class="w-50">
        @csrf
        {{-- Category Name --}}
        <div class="mb-3">
            <label for="category_name" class="form-label">اسم القسم</label>
            <input type="text" name="name" id="category_name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="قسم تجريبي">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">رابط الوصول</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                value="{{ old('slug') }}" placeholder="testing-category-slug">
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
                    <option value="{{ $cate->id }}">
                        {{ $cate->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-primary">حفظ</button>
    </form>
@endsection
