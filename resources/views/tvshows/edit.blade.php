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
            <h6 class="mb-2 fw-bold">قائمة المسلسلات</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tvshows.index') }}">برامج تلفزيونية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل بيانات برنامج</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tvshows.update', $tvshow->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-7 py-4 px-5">
                        {{-- Title --}}
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label">اسم البرنامج</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ $tvshow->title }}">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Production year --}}
                        <div class="row mb-3">
                            <label for="year" class="col-md-3 col-form-label">سنة الإنتاج</label>
                            <div class="col-md-9">
                                <select name="year" id="year" class="form-select">
                                    <option value="" hidden>--اختار--</option>
                                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                        <option value="{{ $i }}" @selected($i == $tvshow->year)>{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        {{-- Language --}}
                        <div class="row mb-3">
                            <label for="language" class="col-md-3 col-form-label">لغة البرنامج</label>
                            <div class="col-md-9">
                                <select id="language" class="form-select @error('language') is-invalid @enderror"
                                    name="language">
                                    <option value="" hidden>--اختار--</option>
                                    @foreach (DataArray::LANGUAGES as $key => $value)
                                        <option value="{{ $value }}" @selected($value == $tvshow->language)>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('language')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Story --}}
                        <div class="row mb-3">
                            <label for="story" class="col-md-3 col-form-label">وصف مختصر</label>
                            <div class="col-md-9">
                                <textarea name="story" id="story" cols="30" rows="5"
                                    class="form-control @error('story') is-invalid @enderror">{{ $tvshow->story }}</textarea>
                                @error('story')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-9 offset-3">
                                <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
                            </div>
                        </div>
                    </div>

                    {{-- Poster --}}
                    <div class="col-md-4 offset-1 py-4">
                        <div class="poster-image update-poster-image">
                            <img src="{{ $tvshow->get_poster() ?? 'https://via.placeholder.com/300x370' }}" class="rounded-2" alt="البوستر الإعلاني للفيلم">
                            <label for="poster" class="update-poster-label">تحميل بوستر البرنامج</label>
                            <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster"
                                name="poster" hidden>
                            @error('poster')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
