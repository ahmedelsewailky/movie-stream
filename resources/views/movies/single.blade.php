{{-- Extend master guest layout --}}
@extends('layouts.guest')

@use('App\Models\Actor', 'Actor')

{{-- Page content --}}
@section('content')
    <section class="single-post-section">
        <div class="container">
            <div class="d-flex">
                <div class="flex-shrink-0 me-4">
                    <img src="https://via.placeholder.com/295x400" alt="Single Post Poster">
                </div>
                <div class="flex-grow-1">
                    <h2>{{ $movie->title }}</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-category"></i>
                                القسم
                                {{ $movie->category->name }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                جودة الفيلم
                                {{ DataArray::QUALITIES[$movie->quality] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                سنة الإنتاج
                                {{ $movie->year }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                لغة الفيلم
                                {{ $movie->language }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                الترحمة
                                {{ DataArray::DUBBED_STATUS[$movie->dubbed_status] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-hash"></i>
                                رقم الفيلم
                                {{ $movie->id }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-group"></i>
                                الممثلين
                                @foreach ($movie_actors as $actor)
                                    <span class="actor-badge">{{ Actor::find($actor->actor_id)->name }}</span>
                                @endforeach
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-group"></i>
                                التصنيف
                                @foreach ($movie->types as $key => $value)
                                    <span class="tag-item">{{ DataArray::TYPES[$key] }}</span>
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <p>{{ $movie->story }}</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-success">اعجبني</a>
                        <a href="#" class="btn btn-success">لم يعجبني</a>
                    </div>
                    <div class="mt-3">
                        <h6>تابعنا علي مواقع التواصل الإجتماعي</h6>
                        <div class="mt-2">
                            <a href="#" class="social-item"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-youtube"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
