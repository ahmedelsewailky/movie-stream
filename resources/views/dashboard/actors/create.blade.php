{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('actors.index') }}">قائمة الممثل</a></li>
            <li class="breadcrumb-item active" aria-current="page">نموذج اضافة ممثل جديد</li>
        </ol>
    </nav>

    <form action="{{ route('actors.store') }}" method="post" class="w-50" enctype="multipart/form-data">
        @csrf
        {{-- Actor name --}}
        <div class="mb-3">
            <label for="name" class="form-label">اسم الممثل</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus value="{{ old('name') }}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Country --}}
        <div class="mb-3">
            <label for="country" class="form-label">الدولة</label>
            <select name="country" id="country" class="form-select">
                <option value="" hidden>--اختار--</option>
                @foreach (DataArray::COUNTRIES as $key => $value)
                    <option value="{{ $value }}" @selected($value == old('country'))>{{ $value }}</option>
                @endforeach
            </select>
            @error('country')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="avatar" class="form-label">الصورة</label>
            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
            @error('avatar')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-primary">حفظ</button>
    </form>
@endsection
