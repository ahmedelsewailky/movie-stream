{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('movies.index') }}">الافلام</a></li>
            <li class="breadcrumb-item active" aria-current="page">اضافة فيلم جديد</li>
        </ol>
    </nav>

    <form action="{{ route('movies.store') }}" method="post" class="w-50">
        @csrf
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">اسم الفيلم</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">القسم</label>
            <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option value="">--حدد القسم--</option>
                @foreach ($categories as $category)
                   <option value="{{ $category->id }}" @selected($category->id == old('category_id'))>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Types --}}
        <div class="mb-3">
            <label for="types" class="form-label">النوع</label>
            <div class="row">
                @foreach (DataArray::TYPES as $key => $value)
                    <div class="col-md-3">
                        <input type="checkbox" name="types[]" id="type-{{ $key }}" value="{{ $value }}" class="form-check-input">
                        <label for="type-{{ $key }}" class="form-check-label">{{ $value }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Qualties --}}
        <div class="mb-3">
            <label for="quality" class="form-label">جودة الفيديو</label>
            <select id="quality" class="form-select @error('quality') is-invalid @enderror" name="quality">
                <option value="">--اختار--</option>
                @foreach (DataArray::QUALITIES as $key => $value)
                   <option value="{{ $key }}" @selected($key == old('quality'))>{{ $value }}</option>
                @endforeach
            </select>
            @error('quality')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Language --}}
        <div class="mb-3">
            <label for="language" class="form-label">لغة الفيلم</label>
            <select id="language" class="form-select @error('language') is-invalid @enderror" name="language">
                <option value="">--اختار--</option>
                @foreach (DataArray::LANGUAGES as $key => $value)
                   <option value="{{ $key }}" @selected($key == old('language'))>{{ $value }}</option>
                @endforeach
            </select>
            @error('language')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Production year --}}
        <div class="mb-3">
            <label for="year" class="form-label">سنة الإنتاج</label>
            <select name="year" id="year" class="form-select">
                <option value="">--اختار--</option>
                @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </form>
@endsection
