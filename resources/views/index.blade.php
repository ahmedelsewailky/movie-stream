{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <section class="section slider-post-trailer">
        <div id="slide-post-trailer" class="carousel slide carousel-fade">
            <div class="indicators">
                <div class="indicator-image active" data-bs-target="#slide-post-trailer" data-bs-slide-to="0">
                    <img src="{{ asset('storage/movies/posters/poster-1.jpg') }}" alt="">
                </div>
                <div class="indicator-image" data-bs-target="#slide-post-trailer" data-bs-slide-to="1">
                    <img src="{{ asset('storage/movies/posters/poster-2.jpg') }}" alt="">
                </div>
            </div>
            <div class="carousel-inner">
                @forelse ($slider_movies as $movie)
                    <div class="carousel-item">
                        <div class="trailer-video">
                            <video autoplay muted loop>
                                <source src="{{ asset('storage/movies/trailers/trailer-1.mp4') }}">
                            </video>
                        </div>
                        <span class="blur"></span>
                        <div class="slide-post-content">
                            <span class="meta-category">افلام اجنبي</span>
                            <h2>Spider Man 3</h2>
                            <div class="align-items-center d-flex my-4 post-meta">
                                <span class="meta-rate"><i class="bx bx-star"></i> 8</span>
                                <span class="meta-date">2023</span>
                                <span class="meta-duration">1 hr 25 mins</span>
                                <span class="meta-quality"><span>الجودة</span> WEB-DL 720P</span>
                            </div>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                حيث
                                يمكنك أن
                                تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص
                                لن
                                يبدو
                                مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج
                                العميل فى
                                كثير من
                                الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            </p>
                            <a href="" class="btn btn-primary"><i class="bx bx-play-circle"></i> مشاهدة الآن</a>
                            <a href="" class="btn btn-outline-primary"><i class="bx bx-bookmark"></i> مشاهدة لاحقا</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center">لا توجد افلام</p>
                @endforelse
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
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">Spiderman 3</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">Taken 2</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">العارف</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">لا تراجع ولا استسلام</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">Pirates of the Caribbean</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
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
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">المداح 4</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">The Boys</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">جعفر العمدة</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">الحشاشين</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-thumbnail">
                            <img src="https://via.placeholder.com/230x310" alt="">
                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                            <a href="">شاهد الآن</a>
                        </div>
                        <div class="post-content">
                            <h6><a href="">طاقة نور</a></h6>
                            <div class="d-flex">
                                <span>2024</span>
                                <span>1 hr 25 mins</span>
                                <span>DVD-720</span>
                            </div>
                            <span>افلام عربية</span>
                        </div>
                    </div>
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
                    @for ($i = 0; $i < 18; $i++)
                        <div class="col-md-2 mb-3">
                            <div class="post inner-post-effect">
                                <div class="post-thumbnail">
                                    <img src="https://via.placeholder.com/280x370" alt="">
                                </div>
                                <div class="post-content">
                                    <h6>
                                        <a href="">Madame Web 2024</a>
                                    </h6>
                                    <div class="d-flex">
                                        <span>2024</span>
                                        <span>1 hr 25 mins</span>
                                    </div>
                                    <p>
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                        النص
                                        العربى
                                    </p>
                                    <a href="" class="btn btn-outline-primary">مشاهدة الآن</a>
                                </div>
                            </div>
                        </div>
                    @endfor

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
