{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Search form --}}
@section('search')
    <form action="{{ route('series.index') }}" method="get">
        <input type="search" class="form-control" id="search" name="q" value="{{ request()->has('q') ? request()->get('q') : '' }}" placeholder="ابحث داخل المسلسلات">
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
                    <li class="breadcrumb-item"><a href="{{ route('series.index') }}">مسلسلات</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل بيانات مسلسل</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <form action="{{ route('series.update', $series->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-7 py-4 px-5">
                        {{-- Title --}}
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label">اسم المسلسل</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $series->title }}">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Types --}}
                        <div class="row mb-3">
                            <label for="types" class="col-md-3 col-form-label">النوع</label>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach (DataArray::TYPES as $key => $value)
                                        <div class="col-md-6 mb-2">
                                            <input type="checkbox" name="types[]" id="type-{{ $value }}" value="{{ $value }}"
                                                class="form-check-input" @checked(is_array($series->types) && in_array($value, $series->types))>
                                            <label for="type-{{ $value }}" class="form-check-label">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                    @error('types.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-3 col-form-label">القسم</label>
                            <div class="col-md-9">
                                <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="" hidden>--حدد القسم--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == $series->category_id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
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
                                        <option value="{{ $i }}" @selected($i == $series->year)>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        {{-- Story --}}
                        <div class="row mb-3">
                            <label for="story" class="col-md-3 col-form-label">قصة المسلسل</label>
                            <div class="col-md-9">
                                <textarea name="story" id="story" cols="30" rows="5"
                                    class="form-control @error('story') is-invalid @enderror">{{ $series->story }}</textarea>
                                @error('story')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actors --}}
                        <div class="row mb-3">
                            <label for="actors" class="col-md-3 col-form-label">فريق العمل</label>
                            <div class="col-md-9">
                                <select id="actors" class="form-select select-2 @error('actors') is-invalid @enderror" name="actors[]"
                                    multiple="multiple">
                                    <option value="" hidden>--اختار--</option>
                                    @foreach ($actors as $actor)
                                        <option value="{{ $actor->id }}" @selected(is_array($series->actors) && in_array($actor->id, $series->actors))>{{ $actor->name }}</option>
                                    @endforeach
                                </select>
                                @error('actors')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 offset-3">
                                <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 offset-1 py-4">
                        {{-- Poster --}}
                        <div class="poster-image update-poster-image">
                            <img src="{{ $series->get_poster() ?? 'https://via.placeholder.com/300x370' }}" class="rounded-2" alt="البوستر الإعلاني للفيلم">
                            <label for="poster" class="update-poster-label">تغيير صورة الفيلم</label>
                            <input type="file" class="form-control @error('poster') is-invalid @enderror"
                                id="poster" name="poster" hidden>
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

{{-- Select 2 Css File --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
@endsection

{{-- Select 2 Js --}}
@section('js')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $(".select-2").select2();
        });
    </script>
@endsection
