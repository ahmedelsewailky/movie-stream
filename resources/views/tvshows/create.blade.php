{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tvshows.index') }}">البرامج التلفزيونية</a></li>
            <li class="breadcrumb-item active" aria-current="page">اضافة برنامج جديد</li>
        </ol>
    </nav>

    <form action="{{ route('tvshows.store') }}" method="post" class="w-50" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">اسم البرنامج</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}">
            @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="row">
            {{-- Production year --}}
            <div class="mb-3 col-md-6">
                <label for="year" class="form-label">سنة الإنتاج</label>
                <select name="year" id="year" class="form-select">
                    <option value="" hidden>--اختار--</option>
                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        <option value="{{ $i }}" @selected($i == old('year'))>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        {{-- Language --}}
        <div class="mb-3">
            <label for="language" class="form-label">لغة البرنامج</label>
            <select id="language" class="form-select @error('language') is-invalid @enderror" name="language">
                <option value="" hidden>--اختار--</option>
                @foreach (DataArray::LANGUAGES as $key => $value)
                    <option value="{{ $value }}" @selected($value == old('language'))>{{ $value }}</option>
                @endforeach
            </select>
            @error('language')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Poster --}}
        <div class="mb-3">
            <label for="poster" class="form-label">بوستر البرنامج</label>
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <img src="https://via.placeholder.com/180x120" class="rounded-2" alt="البوستر الإعلاني للبرنامج">
                </div>
                <div class="flex-grow-1">
                    <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster"
                        name="poster">
                    @error('poster')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Story --}}
        <div class="mb-3">
            <label for="story" class="form-label">وصف مختصر</label>
            <textarea name="story" id="story" cols="30" rows="5"
                class="form-control @error('story') is-invalid @enderror">{{ old('story') }}</textarea>
            @error('story')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
    </form>
@endsection
