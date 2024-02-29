{{-- Extends master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tvshows.index') }}">برامج تلفزيونية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tvshows.show', $tvshow->id) }}">{{ $tvshow->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">تعديل بيانات حلقة</li>
        </ol>
    </nav>

    <form action="{{ route('tvshows.episodes.update', $episode->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="episode" class="form-label">رقم الحلقة</label>
            <select name="episode" id="episode" class="form-select @error('episode') is-invalid @enderror">
                <option value="">--اختر--</option>
                @for ($i=1; $i<500; $i++)
                    <option value="{{ $i }}" @selected($episode->episode == $i)>{{ $i }}</option>
                @endfor
            </select>
            @error('episode')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Qualties --}}
        <div class="mb-3 col-md-6">
            <label for="quality" class="form-label">جودة الفيديو</label>
            <select id="quality" class="form-select @error('quality') is-invalid @enderror" name="quality">
                <option value="" hidden>--اختار--</option>
                @foreach (DataArray::QUALITIES as $key => $value)
                    <option value="{{ $key }}" @selected($key == $episode->quality)>{{ $value }}</option>
                @endforeach
            </select>
            @error('quality')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Watched Links --}}
        <div class="mb-3">
            <label for="" class="form-label">سيرفر المشاهدة</label>
            <input type="text"
            class="mb-3 form-control @error('watch_link') is-invalid @enderror"
            name="watch_link"
            placeholder="https://www.test.com/link/of/watch/url"
            value="{{ $episode->watch_link }}">
            @error('watch_link')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        {{-- Download Links --}}
        <div class="mb-3">
            <label for="" class="form-label">روابط التحميل</label>
            <div class="links-fields">
                @foreach ($episode->links as $link)
                    @if ($link != null)
                        <input type="text"
                            class="mb-3 form-control
                            @error('links.*') is-invalid @enderror"
                            name="links[]"
                            value="{{ $link }}">
                        @error('links.*')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    @endif
                @endforeach
            </div>
            <button type="button" id="addLink" class="btn btn-sm btn-light">اضف رابط اخر</button>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
@endsection

@section('js')
    <script>
        $(function() {
            let new_input_link =
                `<input type="text" class="mb-3 form-control" name="links[]" placeholder="https://www.test.download/link/here">`;

            $("#addLink").on("click", function() {
                $(".links-fields").append(new_input_link);
            });
        });
    </script>
@endsection
