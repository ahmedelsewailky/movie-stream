{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <div class="container">
        <section class="section">
            <div id="movieCarouselSlider" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#movieCarouselSlider" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#movieCarouselSlider" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#movieCarouselSlider" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/poster-1.jpg') }}')">
                        <span class="overlay"></span>
                        <div class="post">
                            <div class="post-thumbnail">
                                <img src="{{ asset('assets/img/poster-1.jpg') }}" alt="">
                            </div>

                            <span class="quality">WEB-HD 720</span>
                            <div class="post-details">
                                <a href="" class="post-category">افلام اجنبي</a>
                                <h6><a href="">وإن رأيت أنياب الليث بارزة فلا تحسبن الليث يبتسم</a></h6>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                    العربى، حيث يمكنك أن تولد مثل هذا النص</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
