{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Search form --}}
@section('search')
    <form action="{{ route('movies.index') }}" method="get">
        <input type="search" class="form-control" id="search" name="q" value="{{ request()->has('q') ? request()->get('q') : '' }}" placeholder="ابحث داخل الافلام">
        <i class="bx bx-search"></i>
    </form>
@endsection

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة الأفلام</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('movies.index') }}">الافلام</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تعديل بيانات فيلم: {{ $movie->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <form action="{{ route('movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-7 py-4 px-5">
                        {{-- Title --}}
                        <div class="row mb-4">
                            <label for="title" class="col-md-3 col-form-label">اسم الفيلم</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ $movie->title }}">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row mb-4">
                            <label for="category_id" class="col-md-3 col-form-label">القسم</label>
                            <div class="col-md-9">
                                <select id="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="" hidden>--حدد القسم--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id == $movie->category_id)>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Types --}}
                        <div class="row mb-4">
                            <label for="types" class="col-md-3 col-form-label">النوع</label>
                            <div class="col-md-9">
                                <div class="row">
                                    @foreach (DataArray::TYPES as $key => $value)
                                        <div class="col-md-3 mb-1">
                                            <input type="checkbox" name="types[]" id="type-{{ $value }}"
                                                value="{{ $key }}" class="form-check-input"
                                                @checked(is_array($movie->types) && in_array($key, $movie->types))>
                                            <label for="type-{{ $value }}"
                                                class="form-check-label">{{ $value }}</label>
                                        </div>
                                    @endforeach

                                    @error('types.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Qualties --}}
                        <div class="row mb-4">
                            <label for="quality" class="col-md-3 col-form-label">جودة الفيديو</label>
                            <div class="col-md-9">
                                <select id="quality" class="form-select @error('quality') is-invalid @enderror"
                                    name="quality">
                                    <option value="" hidden>--اختار--</option>
                                    @foreach (DataArray::QUALITIES as $key => $value)
                                        <option value="{{ $key }}" @selected($key == $movie->quality)>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('quality')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Production year --}}
                        <div class="row mb-4">
                            <label for="year" class="col-md-3 col-form-label">سنة الإنتاج</label>
                            <div class="col-md-9">
                                <select name="year" id="year" class="form-select">
                                    <option value="" hidden>--اختار--</option>
                                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                        <option value="{{ $i }}" @selected($movie->year == $i)>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        {{-- Language --}}
                        <div class="row mb-4">
                            <label for="language" class="col-md-3 col-form-label">لغة الفيلم الأصلية</label>
                            <div class="col-md-9">
                                <select id="language" class="form-select @error('language') is-invalid @enderror"
                                    name="language">
                                    <option value="" hidden>--اختار--</option>
                                    @foreach (DataArray::LANGUAGES as $key => $value)
                                        <option value="{{ $value }}" @selected($value == $movie->language)>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('language')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Budded Status --}}
                        <div class="row mb-4">
                            <div class="col-md-9 offset-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="radio" name="dubbed_status" class="form-check-input"
                                            id="dubded_status_0" value="0" @checked($movie->dubbed_status == 0)>
                                        <label for="dubded_status_0" class="form-check-label">اللغة الأصلية</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="dubbed_status" class="form-check-input"
                                            id="dubded_status_1" value="1" @checked($movie->dubbed_status == 1)>
                                        <label for="dubded_status_1" class="form-check-label">مدبلج</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" name="dubbed_status" class="form-check-input"
                                            id="dubded_status_2" value="2" @checked($movie->dubbed_status == 2)>
                                        <label for="dubded_status_2" class="form-check-label">مترجم</label>
                                    </div>
                                    @error('dubbed_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Story --}}
                        <div class="row mb-4">
                            <label for="story" class="col-md-3 col-form-label">قصة الفيلم</label>
                            <div class="col-md-9">
                                <textarea name="story" id="story" cols="30" rows="5"
                                    class="form-control @error('story') is-invalid @enderror">{{ $movie->story }}</textarea>
                                @error('story')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Actors --}}
                        <div class="row mb-4">
                            <label for="actors" class="col-md-3 col-form-label">فريق العمل</label>
                            <div class="col-md-9">
                                <select id="actors" class="form-select select-2 @error('actors') is-invalid @enderror"
                                    name="actors[]" multiple="multiple">
                                    <option value="" hidden>--اختار--</option>
                                    @foreach ($actors as $actor)
                                        <option value="{{ $actor->id }}"
                                            {{ is_array($movieActors) && in_array($actor->id, $movieActors) ? 'selected' : false }}>
                                            {{ $actor->name }}</option>
                                    @endforeach
                                </select>
                                @error('actors')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Watched Links --}}
                        <div class="row mb-4">
                            <label for="" class="col-md-3 col-form-label">سيرفر المشاهدة</label>
                            <div class="col-md-9">
                                <input type="text" class="mb-3 form-control @error('watch_link') is-invalid @enderror"
                                    name="watch_link" value="{{ $movie->watch_link }}">
                                @error('watch_link')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Download Links --}}
                        <div class="row mb-4">
                            <label for="" class="col-md-3 col-form-label">روابط التحميل</label>
                            <div class="col-md-9">
                                <div class="links-fields">
                                    @foreach ($movie->links as $link)
                                        @if ($link != null)
                                            <input type="text"
                                                class="mb-3 form-control @error('links.*') is-invalid @enderror"
                                                name="links[]" value="{{ $link }}">
                                            @error('links.*')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        @endif
                                    @endforeach
                                </div>
                                <button type="button" id="addLink" class="btn btn-sm btn-light">اضف رابط اخر</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 offset-3">
                                <button type="submit" class="btn btn-sm btn-primary">حفظ ونشر</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 offset-1" style="background-color: #403c57;padding: 1rem;">
                        {{-- Poster --}}
                        <div class="poster-image update-poster-image">
                            <img src="{{ get_poster($movie->poster, '300x370') }}" class="rounded-2" alt="البوستر الإعلاني للفيلم">

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

            let new_input_link =
                `<input type="text" class="mb-3 form-control" name="links[]" placeholder="https://www.test.download/link/here">`;

            $("#addLink").on("click", function() {
                $(".links-fields").append(new_input_link);
            });
        });
    </script>
@endsection
