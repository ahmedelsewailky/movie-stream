{{-- This page is used to display all the works of a particular actor, and is used in the front-end of the website --}}
{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Define page title --}}
@section('title', 'مشاهدة اعمال ' . $actor->name)

{{-- Page content --}}
@section('content')
    <section class="my-5 py-5">
        <div class="container">
            <h2 class="text-start my-4 fs-5 fw-lighter">تصفح جميع أعمال <span class="fw-bold text-warning">{{ $actor->name }}</span></h2>

            <div class="mt-5 pt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="movie-tab" data-bs-toggle="tab" data-bs-target="#actor-movie-tab"
                            type="button" role="tab" aria-controls="actor-movie-tab" aria-selected="true">الأفلام ({{ $actor->get_actor_movies()->count() }})</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="series" data-bs-toggle="tab" data-bs-target="#series-pane"
                            type="button" role="tab" aria-controls="series-pane"
                            aria-selected="false">المسلسلات ({{ $actor->get_actor_series()->count() }})</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="actor-movie-tab" role="tabpanel" aria-labelledby="movie-tab" tabindex="0">
                        <div class="row">
                            @forelse ($actor->get_actor_movies() as $movie)
                                <div class="col-md-3 mb-3">
                                    <div class="post">
                                        <div class="post-thumbnail"
                                            style="background-image: url('{{ get_poster($movie->poster, '280x370') }}')">
                                        </div>
                                        <div class="post-content">
                                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                            <div class="top-post-content">
                                                <span class="meta meta-quality">{{ DataArray::QUALITIES[$movie->quality] }}</span>
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
                                </div>
                            @empty
                                <p class="text-center">لا توجد مشاركات</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane fade" id="series-pane" role="tabpanel" aria-labelledby="series" tabindex="0">
                        <div class="row">
                            @forelse ($actor->get_actor_series() as $series)
                                <div class="col-md-3 mb-3">
                                    <div class="post">
                                        <div class="post-thumbnail"
                                            style="background-image: url('{{ get_poster($series->poster, '280x370') }}')">
                                        </div>
                                        <div class="post-content">
                                            <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                            <div class="top-post-content">
                                            </div>
                                            <div class="bottom-post-content">
                                                <h6 class="post-title"><a
                                                        href="{{ route('web.series.show', $series->slug) }}">{{ str($series->title)->words(3) }}</a>
                                                </h6>
                                                <span class="meta meta-durations ">
                                                    <i class="bx bx-time-five"></i>
                                                    1 hr 25 mins
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">لا توجد مشاركات</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
