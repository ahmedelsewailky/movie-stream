{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <section class="section slider-post-trailer">
        <div id="slide-post-trailer" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($slider_movies as $movie)
                    <div @class(['active' => $loop->index == 0, 'carousel-item'])>
                        <div class="trailer-image" style="background-image: url('{{ asset('storage/' . $movie->poster) }}')"></div>
                        <span class="blur"></span>
                        <div class="slide-post-content">
                            <span class="meta-category">{{ $movie->category->name }}</span>
                            <h2>{{ $movie->title }}</h2>
                            <div class="align-items-center d-flex my-4 post-meta">
                                <span class="meta-rate"><i class="bx bx-star"></i> 8</span>
                                <span class="meta-date">{{ $movie->year }}</span>
                                <span class="meta-duration">1 hr 25 mins</span>
                                <span class="meta-quality"><span>الجودة</span> WEB-DL 720P</span>
                            </div>
                            <p>{{ $movie->story }}</p>
                            <a href="" class="btn btn-success"><i class="bx bx-play-circle"></i> مشاهدة الآن</a>
                            <a href="" class="btn btn-outline-success"><i class="bx bx-bookmark"></i> مشاهدة
                                لاحقا</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slide-post-trailer" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slide-post-trailer" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="section trending-movies my-5 py-4">
        <div class="container">
            <div class="section-header ">
                <span><i class="bx bx-trending-up"></i></span>
                <h3>الأكثر تداولاً</h3>
                <a href="" class="load-more">
                    عرض المزيد
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="owl-carousel">
                    @forelse (\App\Models\Movie::orderByDesc('views')->take(10)->get() as $movie)
                        <div class="post">
                            <div class="post-thumbnail"
                                style="background-image: url('{{ get_poster($movie->poster, '280x370') }}')"></div>
                            <div class="post-content">
                                <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                <div class="top-post-content">
                                    <span class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                                    <span class="meta meta-category">{{ $movie->category->name }}</span>
                                </div>
                                <div class="bottom-post-content">
                                    <h6 class="post-title"><a
                                            href="{{ route('web.movie.show', $movie->slug) }}">{{ str($movie->title)->words(3) }}</a>
                                    </h6>
                                    <span class="meta meta-durations ">
                                        <i class="bx bx-time-five"></i>
                                        1 hr 25 mins
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">لا توجد مشاركات</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="section latest-series my-5 py-4">
        <div class="container">
            <div class="section-header ">
                <span><i class="bx bx-video-recording"></i></span>
                <h3>جديد المسلسلات</h3>
                <a href="#" class="load-more">
                    عرض المزيد
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="owl-carousel">
                    @forelse ($episodes as $s_episode)
                        <div class="post">
                            <div class="post-thumbnail"
                                style="background-image: url('{{ get_poster($s_episode->series->poster, '280x370') }}')">
                            </div>
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <div class="post-content">
                                <div class="top-post-content">
                                    <span class="meta meta-quality">{{ DataArray::QUALITIES[$s_episode->quality] }}</span>
                                    <span class="meta meta-category">{{ $s_episode->series->category->name }}</span>
                                </div>
                                <div class="bottom-post-content">
                                    <h6 class="post-title"><a
                                            href="{{ route('web.series.show', $s_episode->series->slug) }}">
                                            {{ $s_episode->series->title }}</a></h6>
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

    <section class="section latest-movies my-5 py-4" id="latest-movies">
        <div class="container">
            <div class="section-header ">
                <span><i class="bx bxl-play-store"></i></span>
                <h3>الأكثر تداولاً</h3>
                <a href="" class="load-more">
                    عرض المزيد
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="filter-content-bar">
                    <a href="{{ route('website') }}#latest-movies" class="filter-item {{ !request()->has('tag') ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        الكل
                    </a>
                    <a href="{{ route('website') }}?tag=arabic-movies#latest-movies" class="filter-item {{ request()->get('tag') == 'arabic-movies' ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        افلام عربي
                    </a>
                    <a href="{{ route('website') }}?tag=indian-movies#latest-movies" class="filter-item {{ request()->get('tag') == 'indian-movies' ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        افلام هندي
                    </a>
                    <a href="{{ route('website') }}?tag=turkish-movie#latest-movies" class="filter-item {{ request()->get('tag') == 'turkish-movie' ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        افلام تركي
                    </a>
                    <a href="{{ route('website') }}?tag=foreign-movies#latest-movies" class="filter-item {{ request()->get('tag') == 'foreign-movies' ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        افلام اجنبي
                    </a>
                    <a href="{{ route('website') }}?tag=asian-movies#latest-movies" class="filter-item {{ request()->get('tag') == 'asian-movies' ? 'active' : false }}">
                        <i class="bx bx-camera-movie"></i>
                        افلام اسيوية
                    </a>
                </div>

                <div class="row">
                    @forelse ($movies as $movie)
                        <div class="col-md-3 mb-3">
                            <div class="post">
                                <div class="post-thumbnail"
                                    style="background-image: url('{{ get_poster($movie->poster, '270x195?text=') }}')">
                                </div>
                                <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                <div class="post-content">
                                    <div class="top-post-content">
                                        <span class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                                        <span class="meta meta-category">{{ $movie->category->name }}</span>
                                    </div>
                                    <div class="bottom-post-content">
                                        <h6 class="post-title"><a href="{{ route('web.movie.show', $movie->slug) }}">فيلم {{ $movie->title }}</a></h6>
                                        <span class="meta meta-durations ">
                                            <i class="bx bx-time-five"></i>
                                            1 hr 25 mins
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">لا توجد بيانات</p>
                    @endforelse

                    {!! $movies->links('pagination::bootstrap-5') !!}
                </div>
            </div>
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
