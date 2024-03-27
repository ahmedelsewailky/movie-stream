{{-- Extend master app layout --}}
@extends('layouts.app')

@use('\App\Models\Actor', 'Actor')

{{-- Search form --}}
@section('search')
    <form action="{{ route('actors.index') }}" method="get">
        <input type="search" class="form-control" id="search" name="q"
            value="{{ request()->has('q') ? request()->get('q') : '' }}" placeholder="ابحث عن ممثل">
        <i class="bx bx-search"></i>
    </form>
@endsection

{{-- Page content --}}
@section('content')
    {{-- Page Breadcrumbs --}}
    <div class="d-flex align-items-center my-4">
        <div class="me-auto">
            <h6 class="mb-2 fw-bold">قائمة الممثلين</h6>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">قائمة الممثلين</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('actors.create') }}" class="btn btn-sm btn-outline-success">اضافة ممثل</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            {{-- Table Filter --}}
            <div class="table-filter-element">
                <form action="?" method="get">
                    <div class="dropdown me-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-auto-close="outside"
                            data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            عرض حسب الدولة
                        </button>
                        <div class="dropdown-menu filter-menu" style="height: 250px; overflow-y: scroll">
                            @foreach (DataArray::COUNTRIES as $country)
                                <label for="county-{{ $country }}" class="form-label d-flex">
                                    <input type="checkbox" id="county-{{ $country }}" class="form-check-input me-2"
                                        name="country[]" value="{{ $country }}" @checked(request()->has('country') && in_array($country, request()->get('country')))>
                                    {{ $country }} ({{ Actor::where('country', $country)->count() }})
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="align-items-center d-flex ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary me-2">عرض النتائج</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-danger">إزالة الفلاتر</a>
                    </div>
                </form>
            </div>

            {{-- Movies Table --}}
            <table class="table table-hover table-borderless">
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
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img src="{{ $actor->get_image_avatar() ?? 'https://via.placeholder.com/65' }}"
                                    width="65" height="65" alt="{{ $actor->name }}"></td>
                            <td><a href="{{ route('actors.show', $actor->id) }}">{{ $actor->name }}</a></td>
                            <td>{{ $actor->country }}</td>
                            <td>
                                فيلم: {{ $actor->get_actor_movies()->count() }}
                                مسلسل: {{ $actor->get_actor_series()->count() }}
                            </td>
                            <td>
                                <a href="{{ route('actors.edit', $actor->id) }}"
                                    class="btn btn-sm btn-success me-1">تعديل</a>
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#confirmDelete{{ $actor->id }}"
                                    class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                        @include('actors.confirm-modal')
                    @empty
                        <tr>
                            <td colspan="6">لا توجد بيانات</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>اسم الممثل</th>
                        <th>الدولة</th>
                        <th>عدد الأعمال بالموقع</th>
                        <th>الخيارات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
