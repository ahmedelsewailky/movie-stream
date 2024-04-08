{{-- Extend master guest layout --}}
@extends('layouts.guest')

@use('App\Models\Actor', 'Actor')

{{-- Page content --}}
@section('content')
    <section class="single-post-section">
        <div class="container">
            <div class="d-flex">
                <div class="flex-shrink-0 me-4">
                    <img src="{{ get_poster($movie->poster, '295x380') }}" width="380" class="rounded-3"
                        alt="Single Post Poster">
                </div>
                <div class="flex-grow-1">
                    <h1 class="mb-3 fs-2">{{ $movie->title }}</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-hash"></i>
                                رقم الفيلم:
                                M000{{ $movie->id }}
                            </span>
                        </div>
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
                        <div class="col-md-12">
                            <span>
                                <i class="bx bx-tag"></i>
                                الوسوم:
                                @foreach ($movie->types as $type)
                                    <span class="movie-tag">{{ DataArray::TYPES[$type] }}</span>
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

                    <div class="single-section-card actors-card my-5">
                        <h6 class="sub-section-title">
                            <i class="bx bx-group me-2"></i>
                            فريق العمل
                        </h6>
                        <div class="row">
                            @foreach ($movie->actors as $actor)
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ get_poster($actor->avatar, '64') }}" width="64" height="64" class="rounded-circle me-3" alt="Actor image">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <a href="{{ route('web.actor.works', $actor->slug) }}">{{ $actor->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-section-card socials-card my-5">
                        <h6>تابعنا علي مواقع التواصل الإجتماعي</h6>
                        <div class="mt-4 text-center">
                            <a href="#" class="social-item"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-youtube"></i></a>
                            <a href="#" class="social-item"><i class="bx bxl-telegram"></i></a>
                        </div>
                    </div>

                    <div class="single-section-card my-5">
                        <h6 class="sub-section-title">
                            <i class="bx bx-tv me-2"></i>
                            سيرفرات المشاهدة
                        </h6>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">سيرفر المشاهدة 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">سيرفر المشاهدة 2</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <iframe width="100%" height="515"
                                    src="https://www.youtube.com/embed/QboLH9ZY6NU?si=FHQEI5Ar4v6pDx6U"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>

                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <iframe width="100%" height="515"
                                    src="https://www.youtube.com/embed/va4jPDLj8NI?si=0vQj7yONqHDZ_U3u"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="single-section-card my-5">
                        <h6 class="sub-section-title">
                            <i class="bx bx-download me-2"></i>
                            سيرفرات التحميل
                        </h6>

                        @foreach ($movie->links as $key => $value)
                            <div class="sds-link">
                                <a href="{{ $value }}"></a>
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bx-download"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small>سيرفر التحميل {{ $key+1 }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-post-related">
        <div class="container">
            <section class="section latest-series my-5 py-4">
                <div class="container">
                    <div class="section-header ">
                        <span><i class="bx bx-video-recording"></i></span>
                        <h3>قد يعجبك أيضا</h3>
                        <a href="#" class="load-more">
                            عرض المزيد
                            <i class="bx bx-left-arrow-alt"></i>
                        </a>
                    </div>
                    <div class="section-body">
                        <div class="owl-carousel">
                            @forelse (\App\Models\Movie::where('category_id', '!=', $movie->category_id)->take(10)->get() as $movie)
                                <div class="post">
                                    <div class="post-thumbnail"
                                        style="background-image: url('{{ get_poster($movie->poster, '280x370') }}')">
                                    </div>
                                    <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                    <div class="post-content">
                                        <div class="top-post-content">
                                            <span
                                                class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                                            <span class="meta meta-category">{{ $movie->category->name }}</span>
                                        </div>
                                        <div class="bottom-post-content">
                                            <h6 class="post-title"><a href="{{ route('web.movie.show', $movie->slug) }}"> {{ $movie->title }}</a>
                                            </h6>
                                            <span class="meta meta-durations ">
                                                <i class="bx bx-time-five"></i>
                                                1 hr 25 mins
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">لا توجد بيانات</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection

{{-- Owlcarousel Css --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection

{{-- Required Owl Carousel For This Page --}}
@section('js')
    <script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                rtl: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: false,
                        loop: false
                    }
                }
            })
        });
    </script>
@endsection
