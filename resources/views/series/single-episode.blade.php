{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Define page title --}}
@section('title', 'الحلقة رقم ' . $episode->episode . ' من مسلسل ' . $series->title . '')

{{-- Page content --}}
@section('content')
    <section class="my-5 py-5">
        <div class="container">
            <h2 class="text-start my-4 fs-5 fw-lighter">مشاهدة وتحميل الحلقة رقم
                <span class="fw-bold text-warning">{{ $episode->episode }}</span>
                من مسلسل
                <a href="{{ route('web.series.show', $series->slug) }}"
                    class="fw-bold text-warning text-decoration-underline">{{ $series->title }}</a>
            </h2>

            <div class="single-section-card my-5">
                <h6 class="sub-section-title">
                    <i class="bx bx-tv me-2"></i>
                    سيرفرات المشاهدة
                </h6>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">سيرفر المشاهدة
                            1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">سيرفر
                            المشاهدة 2</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <iframe width="100%" height="515"
                            src="https://www.youtube.com/embed/QboLH9ZY6NU?si=FHQEI5Ar4v6pDx6U" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>

                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <iframe width="100%" height="515"
                            src="https://www.youtube.com/embed/va4jPDLj8NI?si=0vQj7yONqHDZ_U3u" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="single-section-card my-5">
                <h6 class="sub-section-title">
                    <i class="bx bx-download me-2"></i>
                    سيرفرات التحميل
                </h6>

                @foreach ($episode->links as $key => $value)
                    <div class="sds-link">
                        <a href="{{ $value }}"></a>
                        <div class="flex-shrink-0 me-3">
                            <i class="bx bx-download"></i>
                        </div>
                        <div class="flex-grow-1">
                            <small>سيرفر التحميل {{ $key + 1 }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
