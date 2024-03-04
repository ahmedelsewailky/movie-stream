{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
<div class="row">
    <div class="col-md-3">

    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
                <div class="post">
                    <div class="post-thumbnail flex-shrink-0 me-4">
                        <img src="{{ asset('assets/img/poster-2.jpg') }}" alt="">
                    </div>
                    <div class="post-details flex-grow-1">
                        <span class="meta meta-category">كوميديا</span>
                        <h3>وإن رأيت أنياب الليث بارزة فلا تحسبن الليث يبتسم</h3>
                        <div class="d-flex align-items-center my-3">
                            <span class="meta meta-views"><i class="bx bxs-hot"></i> 78.526</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
