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

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('website') }}" @class(['nav-link', 'active' => Request::routeIs('website')])>الرئيسية</a>
                    </li>
                    @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
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
                <form class="d-flex" role="search" action="" method="">
                    <input class="form-control me-2" type="search" placeholder="بحث" aria-label="Search">
                </form>

            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
