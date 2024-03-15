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
                <div class="carousel-item active">
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

                <div class="carousel-item">
                    <div class="trailer-video">
                        <video autoplay muted loop>
                            <source src="{{ asset('storage/movies/trailers/trailer-2.mp4') }}">
                        </video>
                    </div>
                    <span class="blur"></span>
                    <div class="slide-post-content">
                        <span class="meta-category">مسلسلات هندي</span>
                        <h2>إلبس عشان خارجين</h2>
                        <div class="align-items-center d-flex my-4 post-meta">
                            <span class="meta-rate"><i class="bx bx-star"></i> 6</span>
                            <span class="meta-date">2024</span>
                            <span class="meta-duration">1 hr 45 mins</span>
                            <span class="meta-quality"><span>الجودة</span> BLUERAY 720P</span>
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

    <section class="section latest-movies my-5">
        <div class="container">
            <div class="section-header ">
                <span><i class="bx bxl-play-store"></i></span>
                <h3>جديد الأفلام</h3>
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
                            <h6><a href="">Spiderman 3</a></h6>
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection

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
