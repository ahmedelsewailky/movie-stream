{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <div class="row">
        @forelse ($parents as $parent)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex">
                        <h6>{{ $parent->name }}</h6>
                        <div class="dropdown ms-auto">
                            <span data-bs-toggle="dropdown">
                                <i class='bx bx-menu'></i>
                            </span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('categories.edit', $parent->id) }}">تعديل</a></li>
                                <li><a class="dropdown-item" href="#">حذف</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
