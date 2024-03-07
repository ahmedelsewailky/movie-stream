<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}">

    <!-- Boxicons Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}">

    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('website') }}" @class(['nav-link', 'active' => Request::routeIs('website')])>مضاف حديثاً</a>
                    </li>
                    @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:void(0)" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $parent->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Models\Category::whereParentId($parent->id)->get() as $category)
                                    <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <a href="" class="btn text-white"><i class="bx bx-search"></i></a>
                <a href="" class="btn btn-success text-white">تسجيل الدخول</a>
            </div>
        </div>
    </nav>

    <section class="slider-section">
        <div class="container">
            <div class="d-flex p-4">
                <div class="flex-grow-1">
                    <h3 class="mt-4">
                        <a href="">تحميل ومشاهدة فيلم فارس بجودة عالية و روابط تحميل مباشرة</a>
                    </h3>
                    <div class="my-3">
                        <span class="meta meta-category me-3"><a href="">افلام عربية</a></span>
                        <span class="meta meta-date me-3"><i class="bx bx-calendar"></i> 07/03/2024</span>
                        <span class="meta meta-quality">
                            <span>الجودة</span>
                            WEB-DL720
                        </span>
                    </div>
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي</p>

                    <a href="" class="btn btn-lg btn-success mt-4">
                        <i class="bx bx-play-circle me-1"></i>
                        شاهد الآن
                    </a>
                </div>
                <div class="flex-shrink-0 ms-4">
                    <div class="poster-thumbnail">
                        <img src="https://via.placeholder.com/250x340" alt="Movie Title Here">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="statiscs-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="static-item">
                        <span>4M</span>
                        <h6>زيارة شهرية</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="static-item">
                        <span>85,501</span>
                        <h6>فيلم</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="static-item">
                        <span>315</span>
                        <h6>مسلسل</h6>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="static-item">
                        <span>104</span>
                        <h6>برنامج تلفزيوني</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ad-section">
        <div class="container">
            <div class="text-center my-5">
                <a href="" target="_blank">
                    <img src="https://via.placeholder.com/630x150?text=مساحة+اعلانية" alt="Ads Banner">
                </a>
            </div>
        </div>
    </section>

    <div class="body-shape"></div>

    <section class="movies-section">
        <div class="container">
            <div class="section-title">
                <h6>جديد الأفلام</h6>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="post">
                            <div class="post-thumbnail">
                                <img src="https://via.placeholder.com/290x310" alt="">
                            </div>
                            <div class="post-details">
                                <span class="meta meta-category"><a href="">افلام هندية</a></span>
                                <h6>
                                    <a href="" target="_blank">تحميل فيلم The Shark الجزء الثاني مدبلج</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
