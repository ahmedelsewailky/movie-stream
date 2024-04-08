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
                    <li class="breadcrumb-item"><a href="{{ route('actors.index') }}">قائمة الممثلين</a></li>
                    <li class="breadcrumb-item active" aria-current="page">نموذج اضافة ممثل جديد</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <form action="{{ route('actors.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-7 py-4 px-5">
                        {{-- Actor name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">اسم الممثل</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" autofocus
                                value="{{ old('name') }}">
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
                                    <option value="{{ $value }}" @selected($value == old('country'))>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label for="avatar" class="form-label">الصورة</label>
                            <input type="file" name="avatar" id="avatar"
                                class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
