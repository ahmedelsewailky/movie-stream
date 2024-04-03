{{-- Extend master guest layout --}}
@extends('layouts.guest')

@use('App\Models\Actor', 'Actor')

{{-- Page content --}}
@section('content')
    <section class="single-post-section">
        <div class="container">
            <div class="d-flex">
                <div class="flex-shrink-0 me-4">
                    <img src="https://via.placeholder.com/295x380" class="rounded-3" alt="Single Post Poster">
                </div>
                <div class="flex-grow-1">
                    <h1 class="mb-3 fs-2">{{ $movie->title }}</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-category"></i>
                                القسم:
                                {{ $movie->category->name }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                جودة الفيلم:
                                {{ DataArray::QUALITIES[$movie->quality] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-calendar"></i>
                                سنة الإنتاج:
                                {{ $movie->year }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                لغة الفيلم:
                                {{ $movie->language }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                الترحمة:
                                {{ DataArray::DUBBED_STATUS[$movie->dubbed_status] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-hash"></i>
                                رقم الفيلم:
                                M000{{ $movie->id }}
                            </span>
                        </div>
                        <div class="col-md-12">
                            <span>
                                <i class="bx bx-tag"></i>
                                الوسوم:
                                @foreach ($movie->types as $key => $value)
                                    <span class="movie-tag">{{ DataArray::TYPES[$key] }}</span>
                                @endforeach
                            </span>
                        </div>
                    </div>

                    <p>{{ $movie->story }}</p>

                    <div class="my-5 d-flex align-items-center">
                        <a href="#" class="btn btn-like"><i class="bx bx-like"></i> اعجبني</a>
                        <a href="#" class="btn btn-dislike"><i class="bx bx-dislike"></i> لم يعجبني</a>

                        <div class="votes">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>

                            <span>(إجمالي 11.805 صوت)</span>
                        </div>
                    </div>

                    <div class="actors-card mt-3">
                        <h6 class="sub-section-title">
                            <i class="bx bx-party me-2"></i>
                            فريق العمل
                        </h6>
                        <div class="row">
                            @foreach ($movie_actors as $actor)
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/40" class="rounded-2" alt="Actor image">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <a href="#">{{ Actor::find($actor->actor_id)->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="socials-card">
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
