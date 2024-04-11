<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website') }}">
            <img src="{{ asset('logo.png') }}" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bx bx-menu"></span>
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