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

    <form action="{{ route('movies.store') }}" method="post" class="w-50" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">اسم الفيلم</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}">
            @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">القسم</label>
            <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option value="" hidden>--حدد القسم--</option>
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
                        <input type="checkbox" name="types[]" id="type-{{ $key }}" value="{{ $value }}"
                            class="form-check-input">
                        <label for="type-{{ $key }}" class="form-check-label">{{ $value }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            {{-- Qualties --}}
            <div class="col-md-6 mb-3">
                <label for="quality" class="form-label">جودة الفيديو</label>
                <select id="quality" class="form-select @error('quality') is-invalid @enderror" name="quality">
                    <option value="" hidden>--اختار--</option>
                    @foreach (DataArray::QUALITIES as $key => $value)
                        <option value="{{ $key }}" @selected($key == old('quality'))>{{ $value }}</option>
                    @endforeach
                </select>
                @error('quality')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            {{-- Production year --}}
            <div class="col-md-6 mb-3">
                <label for="year" class="form-label">سنة الإنتاج</label>
                <select name="year" id="year" class="form-select">
                    <option value="" hidden>--اختار--</option>
                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        {{-- Language --}}
        <div class="mb-3">
            <label for="language" class="form-label">لغة الفيلم الأصلية</label>
            <select id="language" class="form-select @error('language') is-invalid @enderror" name="language">
                <option value="" hidden>--اختار--</option>
                @foreach (DataArray::LANGUAGES as $key => $value)
                    <option value="{{ $key }}" @selected($key == old('language'))>{{ $value }}</option>
                @endforeach
            </select>
            @error('language')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Budded Status --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="radio" name="dubbed_status" class="form-check-input" id="dubded_status_0" value="0"
                        checked>
                    <label for="dubded_status_0" class="form-check-label">لا شئ</label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="dubbed_status" class="form-check-input" id="dubded_status_1" value="1">
                    <label for="dubded_status_1" class="form-check-label">مدبلج</label>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="dubbed_status" class="form-check-input" id="dubded_status_2" value="2">
                    <label for="dubded_status_2" class="form-check-label">مترجم</label>
                </div>
            </div>
        </div>

        {{-- Poster --}}
        <div class="mb-3">
            <label for="poster" class="form-label">بوستر الفيلم</label>
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <img src="https://via.placeholder.com/180x120" class="rounded-2" alt="البوستر الإعلاني للفيلم">
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
            <label for="story" class="form-label">قصة الفيلم</label>
            <textarea name="story" id="story" cols="30" rows="5"
                class="form-control @error('story') is-invalid @enderror">{{ old('story') }}</textarea>
            @error('story')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Actors --}}
        <div class="mb-3">
            <label for="actors" class="form-label">فريق العمل</label>
            <select id="actors" class="form-select select-2 @error('actors') is-invalid @enderror" name="actors[]"
                multiple="multiple">
                <option value="" hidden>--اختار--</option>
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}" @selected($actor->id == old('actors'))>{{ $actor->name }}</option>
                @endforeach
            </select>
            @error('actors')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Watched Links --}}
        <div class="mb-3">
            <label for="" class="form-label">سيرفر المشاهدة</label>
            <input type="text" class="form-control mb-3" name="watch_link">
        </div>

        {{-- Download Links --}}
        <div class="mb-3">
            <label for="" class="form-label">روابط التحميل</label>
            <div class="links-fields">
                <input type="text" class="form-control mb-3" name="links[]">
            </div>
            <button type="button" id="addLink" class="btn btn-sm btn-light">اضف رابط اخر</button>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $(".select-2").select2();

            let new_input_link = `<input type="text" class="form-control mb-3" name="links[]" placeholder="https://www.test.download/link/here">`;

            $("#addLink").on("click", function() {
                $(".links-fields").append(new_input_link);
            });
        });
    </script>
@endsection
