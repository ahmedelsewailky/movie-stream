{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">قائمة الممثلين</li>
        </ol>
    </nav>

    <div class="mb-3">
        <a href="{{ route('actors.create') }}" class="btn btn-sm btn-primary">اضافة ممثل </a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>الصورة</th>
                <th>اسم الممثل</th>
                <th>الدولة</th>
                <th>عدد الأعمال بالموقع</th>
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($actors as $actor)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><img src="{{ $actor->get_image_avatar() ?? 'https://via.placeholder.com/65' }}" width="65" height="65" alt="{{ $actor->name }}"></td>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->country }}</td>
                    <td>
                        فيلم: {{ $actor->getMoviesCount($actor) }}
                        مسلسل: 35
                    </td>
                    <td>
                        <a href="{{ route('actors.edit', $actor->id) }}" class="btn btn-sm btn-success me-1">تعديل</a>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $actor->id }}" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
                @include('actors.confirm-modal')
            @empty
                <tr>
                    <td colspan="6">لا توجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
