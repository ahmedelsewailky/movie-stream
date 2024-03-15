{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <div class="container">
        <div class="d-flex">
            <div class="flex-shrink-0 me-3">
                <img src="https://via.placeholder.com/250x330" width="250" height="330" class="rounded-3" alt="">
            </div>
            <div class="flex-grow-1">
                <h1>الحلقة رقم {{ $post->episode }} من برنامج الحياة الموسم الأول</h1>
            </div>
        </div>
    </div>
@endsection
