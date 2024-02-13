{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="post" class="w-50">
        @csrf
        @method('PUT')
        {{-- Category Name --}}
        <div class="mb-3">
            <label for="category_name" class="form-label">اسم القسم</label>
            <input type="text" name="name" id="category_name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $category->name }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">رابط الوصول</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') ?? $category->slug }}">
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
                    <option value="{{ $cate->id }}" {{ $cate->id == $category->parent_id ? 'selected' : false }}>{{ $cate->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-primary">حفظ التغيرات</button>
    </form>
@endsection
