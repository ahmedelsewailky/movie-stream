{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Define page title --}}
@section('title', 'البحث عن ' . request()->get('q'))

{{-- Page content --}}
@section('content')
    <section class="my-5 py-5">
        <div class="container">
            <h2 class="text-start my-4 fw-lighter fs-5  ">انت تبحث عن:  <span
                    class="fw-bold text-warning">{{ request()->get('q') }}</span></h2>

            <div class="mt-5 pt-4">
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-md-3 mb-3">
                            <div class="post">
                                <div class="post-thumbnail"
                                    style="background-image: url('{{ get_poster($post->poster, '280x370') }}')">
                                </div>
                                <div class="post-content">
                                    <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                    @if ($post->category->parent_id == 1)
                                        <div class="top-post-content">
                                            <span
                                                class="meta meta-quality">{{ DataArray::QUALITIES[$post->quality] }}</span>
                                        </div>
                                    @endif
                                    <div class="bottom-post-content">
                                        <h6 class="post-title">
                                            @if ($post->category->parent_id == 1)
                                                <a
                                                    href="{{ route('web.movie.show', $post->slug) }}">{{ str($post->title)->words(3) }}</a>
                                            @elseif ($post->category->parent_id == 2)
                                                <a
                                                    href="{{ route('web.series.show', $post->slug) }}">{{ str($post->title)->words(3) }}</a>
                                            @else
                                                <a href="#">{{ str($post->title)->words(3) }}</a>
                                            @endif
                                        </h6>
                                        @if ($post->duration)
                                            <span class="meta meta-durations ">
                                                <i class="bx bx-time-five"></i>
                                                {{ $post->duration }}
                                            </span>
                                        @endif
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
    </section>
@endsection
