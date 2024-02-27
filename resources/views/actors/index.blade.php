{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Actor', 'Actor')

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

    <div class="row">
        <div class="col-md-3">
            <form action="?" method="get" class="d-flex">
                <input type="search" class="form-control" name="q" value="{{ request()->has('q') ? request()->get('q') : false }}">
                <button type="submit" class="btn btn-sm btn-success">بحث</button>
            </form>
            <form class="filter-box" method="get" action="?">
                <div class="dropdown mt-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        عرض حسب الدولة
                      </button>
                    <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                        @foreach (DataArray::COUNTRIES as $country)
                            <label for="county-{{ $country }}" class="form-label d-flex">
                                <input type="checkbox" id="county-{{ $country }}" class="form-check me-2" name="country[]" value="{{ $country }}">
                                {{ $country }} ({{ Actor::where('country', $country)->count() }})
                            </label>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">تطبيق الفلتر</button>
                <a href="{{ route('actors.index') }}" class="btn btn-sm btn-danger">تصفية الفلاتر</a>
            </form>
        </div>

        <div class="col-md-9">
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
                            <td><a href="{{ route('actors.show', $actor->id) }}">{{ $actor->name }}</a></td>
                            <td>{{ $actor->country }}</td>
                            <td>
                                فيلم: {{ $actor->get_actor_movies()->count() }}
                                مسلسل: {{ $actor->get_actor_series()->count() }}
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
        </div>
    </div>

@endsection
