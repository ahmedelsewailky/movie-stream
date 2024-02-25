{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الأفلام</li>
        </ol>
    </nav>

    <div class="mb-3">
        <a href="{{ route('episodes.create', $series->id) }}" class="btn btn-sm btn-primary">اضافة حلقة جديدة</a>
    </div>

    <div class="row">
        @foreach ($series->episodes as $episode)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body d-flex">
                        <h6>الحلقة رقم {{ $episode->episode }}</h6>
                        <div class="d-flex ms-auto">
                            <a href="" class="btn btn-sm btn-success">تعديل</a>
                            <a href="" class="btn btn-sm btn-danger ms-1">حذف</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
