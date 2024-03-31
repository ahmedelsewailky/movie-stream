{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <section class="section slider-post-trailer">
        <div id="slide-post-trailer" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($slider_movies as $movie)
                    <div @class(['active' => $loop->index == 0, 'carousel-item'])>
                        <div class="trailer-video">
                            <video autoplay muted loop>
                                <source src="{{ asset('storage/movies/trailers/trailer-1.mp4') }}">
                            </video>
                        </div>
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
                            <a href="" class="btn btn-primary"><i class="bx bx-play-circle"></i> مشاهدة الآن</a>
                            <a href="" class="btn btn-outline-primary"><i class="bx bx-bookmark"></i> مشاهدة لاحقا</a>
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
                            <div class="post-thumbnail" style="background-image: url('{{ get_poster($movie->poster, '280x370') }}')"></div>
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <span class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                            <div class="post-content">
                                <span class="meta meta-category">{{ $movie->category->name }}</span>
                                <h6 class="post-title"><a href="{{ route('movie.show', $movie->slug) }}">تحميل ومشاهدة فيلم {{ str($movie->title)->words(3) }}</a></h6>
                                <span class="meta meta-durations ">
                                    <i class="bx bx-time-five"></i>
                                    1 hr 25 mins
                                </span>
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
                <a href="" class="load-more">
                    عرض المزيد
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
            </div>
            <div class="section-body">
                <div class="owl-carousel">
                    @forelse (\App\Models\SeriesEpisode::orderByDesc('id')->take(10)->get() as $s_episode)
                        <div class="post">
                            <div class="post-thumbnail" style="background-image: url('{{ get_poster($s_episode->poster, '280x370') }}')"></div>
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <span class="meta meta-quality">{{ DataArray::QUALITIES[$s_episode->quality] }}</span>
                            <div class="post-content">
                                <span class="meta meta-category">{{ $s_episode->series->category->name }}</span>
                                <h6 class="post-title"><a href=""> {{ $s_episode->series->title }}</a></h6>
                                <span class="meta meta-durations ">
                                    <i class="bx bx-time-five"></i>
                                    1 hr 25 mins
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">لا توجد بيانات</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="section latest-movies my-5 py-4">
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
                    <a href="" class="filter-item active">
                        <i class="bx bx-camera-movie"></i>
                        الكل
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام عربي
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام هندي
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام تركي
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام اجنبي
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام اسيوية
                    </a>
                    <a href="" class="filter-item">
                        <i class="bx bx-camera-movie"></i>
                        افلام انمي
                    </a>
                </div>

                <div class="row">
                    @forelse ($movies as $movie)
                        <div class="col-md-3 mb-3">
                            <div class="post">
                                <div class="post-thumbnail" style="background-image: url('{{ get_poster($movie->poster, '270x195?text=') }}')"></div>
                                <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                <span class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                                <div class="post-content">
                                    <span class="meta meta-category">{{ $movie->category->name }}</span>
                                    <h6 class="post-title"><a href="">فيلم {{ $movie->title }}</a></h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">لا توجد بيانات</p>
                    @endforelse

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section news-section latest-tvshows my-5 py-4">
        <div class="container">
            <div class="section-header ">
                <span><i class="bx bx-news"></i></span>
                <h3>آخر الأخبار</h3>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="https://via.placeholder.com/162x180" width="162" height="180"
                                    class="rounded-2" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6>
                                    <a href="">الست اللي بتظهر لحسن الصباح من هي ؟</a>
                                </h6>
                                <div class="d-flex align-items-center my-2">
                                    <span class="author">
                                        <img src="https://via.placeholder.com/40" width="40" height="40"
                                            class="rounded-circle me-2" alt="John Doe">
                                        احمد محمد
                                    </span>
                                    <span class="ms-3">15 مارس 2024</span>
                                </div>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                    الحروف التى يولدها التطبيق.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="https://via.placeholder.com/162x180" width="162" height="180"
                                    class="rounded-2" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6>
                                    <a href="">محمد القس عن تقديم دور صعيدي في «بـ100 راجل»: «اللهجة شبه السوري»</a>
                                </h6>
                                <div class="d-flex align-items-center my-2">
                                    <span class="author">
                                        <img src="https://via.placeholder.com/40" width="40" height="40"
                                            class="rounded-circle me-2" alt="John Doe">
                                        احمد محمد
                                    </span>
                                    <span class="ms-3">15 مارس 2024</span>
                                </div>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                    الحروف التى يولدها التطبيق.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="https://via.placeholder.com/162x180" width="162" height="180"
                                    class="rounded-2" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6>
                                    <a href="">بعد مرور 22 عامًا.. مخرج «عائلة الحاج متولى» يكشف سرًا عن نهاية
                                        المسلسل (فيديو)</a>
                                </h6>
                                <div class="d-flex align-items-center my-2">
                                    <span class="author">
                                        <img src="https://via.placeholder.com/40" width="40" height="40"
                                            class="rounded-circle me-2" alt="John Doe">
                                        احمد محمد
                                    </span>
                                    <span class="ms-3">15 مارس 2024</span>
                                </div>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                    الحروف التى يولدها التطبيق.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="https://via.placeholder.com/162x180" width="162" height="180"
                                    class="rounded-2" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6>
                                    <a href="">هل تقبيل الزوج لزوجته في نهار رمضان يفسد الصيام؟ سعاد صالح توضح</a>
                                </h6>
                                <div class="d-flex align-items-center my-2">
                                    <span class="author">
                                        <img src="https://via.placeholder.com/40" width="40" height="40"
                                            class="rounded-circle me-2" alt="John Doe">
                                        احمد محمد
                                    </span>
                                    <span class="ms-3">15 مارس 2024</span>
                                </div>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                    الحروف التى يولدها التطبيق.
                                </p>
                            </div>
                        </div>
                    </div>
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
                        nav: true,
                        loop: false
                    }
                }
            })
        });
    </script>
@endsection
