{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <section class="my-5 py-5">
        <div class="container">
            <h2 class="text-center my-4 fs-6">مشاهدة وتحميل الحلقة رقم 
                <span class="fw-bold text-warning">{{ $episode->episode }}</span>
                من مسلسل
                <a href="{{ route('web.series.show', $series->slug) }}" class="fw-bold text-warning text-decoration-underline">{{ $series->title }}</a>
            </h2>

            ..
        </div>
    </section>
@endsection
