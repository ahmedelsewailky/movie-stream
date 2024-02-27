{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{ route('actors.index') }}">قائمة الممثلين</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $actor->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <img src="{{ $actor->get_image_avatar() ?? 'https://via.placeholder.com/100' }}"
                                alt="{{ $actor->name }}">
                        </div>

                        <div class="flex-grow-1">
                            <h4>{{ $actor->name }}</h4>
                            <i class="bx bx-map"></i>
                            {{ $actor->country }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <section class="actor-movies">
                <div class="section-title">
                    <h6>الأفلام</h6>
                </div>
                <div class="section-body">
                    <div class="row">
                        @foreach ($actor->get_actor_movies() as $movie)
                            <div class="col-md-3">
                                <h6>{{ $movie->title }}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="actor-movies">
                <div class="section-title">
                    <h6>المسلسلات</h6>
                </div>
                <div class="section-body">
                    <div class="row">
                        @foreach ($actor->get_actor_series() as $series)
                            <div class="col-md-3">
                                <h6>{{ $series->title }}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
