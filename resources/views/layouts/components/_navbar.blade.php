<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website') }}">
            <img src="{{ asset('logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('website') }}" @class(['nav-link', 'active' => Request::routeIs('website')])>مضاف حديثاً</a>
                </li>
                @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $parent->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\Category::whereParentId($parent->id)->get() as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('web.category', $category->slug) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>

            <form action="" method="get">
                <input type="text" name="q" class="form-control" placeholder="هل تبحث عن شئ ما">
                <button type="submit" class="btn btn-success"><i class="bx bx-search"></i></button>
            </form>

            @guest
                <a href="{{ route('login') }}" class="btn btn-success text-white">تسجيل الدخول</a>
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-success text-white">لوحة التحكم</a>
            @endguest
        </div>
    </div>
</nav>

<nav class="mobile-navbar">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                @guest
                    <i class="bx bx-log-in"></i>
                @else
                    <img src="https://via.placeholder.com/32" alt="{{ auth()->user()->name }}">
                @endguest
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('website') }}" class="nav-link">
                <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#mobileNavMenu">
                <i class="bx bx-menu"></i>
            </a>
        </li>
    </ul>

    <div class="offcanvas offcanvas-end" id="mobileNavMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $parent->name }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (\App\Models\Category::whereParentId($parent->id)->get() as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('web.category', $category->slug) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
