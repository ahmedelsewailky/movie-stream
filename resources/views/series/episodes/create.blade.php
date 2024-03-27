{{-- Extends master app layout --}}
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
                    <li class="breadcrumb-item"><a href="{{ route('series.index') }}">مسلسلات</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('series.show', $series->id) }}">{{ $series->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">اضافة حلقة جديدة</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('series.create') }}" class="btn btn-sm btn-outline-success">+ اضافة مسلسل جديد</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">اضافة حلقة جديدة لمسلسل <span class="text-success ">{{ $series->title }}</span></h5>
            <form action="{{ route('series.episodes.store') }}" class="w-50" method="POST">
                @csrf
                <div class="row mb-3 d-none">
                    <label for="series_id" class="col-md-3 col-form-label">حلقة جديدة من مسلسل</label>
                    <div class="col-md-9">
                        <select name="series_id" id="series_id" class="form-select @error('series_id') is-invalid @enderror">
                            <option value="{{ $series->id }}">{{ $series->title }}</option>
                        </select>
                        @error('series_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="episode" class="col-md-3 col-form-label">رقم الحلقة</label>
                    <div class="col-md-9">
                        <select name="episode" id="episode" class="form-select @error('episode') is-invalid @enderror">
                            <option value="">--اختر--</option>
                            @for ($i=1; $i<500; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('episode')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Qualties --}}
                <div class="row mb-3">
                    <label for="quality" class="col-md-3 col-form-label">جودة الفيديو</label>
                    <div class="col-md-9">
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
                </div>

                {{-- Watched Links --}}
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">سيرفر المشاهدة</label>
                    <div class="col-md-9">
                        <input type="text" class="mb-3 form-control @error('watch_link') is-invalid @enderror" name="watch_link" value="{{ old('watch_link') }}">
                        @error('watch_link')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Download Links --}}
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">روابط التحميل</label>
                    <div class="col-md-9">
                        <div class="links-fields">
                            @if (old('links'))
                                @foreach (old('links') as $old_link )
                                    <input type="text" class="mb-3 form-control @error('links.*') is-invalid @enderror" name="links[]" value="{{ $old_link }}">
                                    @error('links.*')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                @endforeach
                            @else
                                <input type="text" class="mb-3 form-control @error('links.*') is-invalid @enderror" name="links[]">
                                @error('links.*')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            @endif

                        </div>
                        <button type="button" id="addLink" class="btn btn-sm btn-light">اضف رابط اخر</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-9 offset-3">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            let new_input_link =
                `<input type="text" class="mb-3 form-control" name="links[]">`;

            $("#addLink").on("click", function() {
                $(".links-fields").append(new_input_link);
            });
        });
    </script>
@endsection
