{{-- Extend master app layout --}}
@extends('layouts.app')

{{-- Page content --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الملف الشخصي</li>
        </ol>
    </nav>

    {{-- Image card --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h6>صورة الملف الشخصي</h6>
                </div>
                <div class="col-md-8">
                    <form action="" method="">
                        <img src="https://via.placeholder.com/100" width="100" height="100" class="rounded-circle" alt="{{ $auth->name }}">
                        <div class="my-3">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                            @error('image')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @else
                                <ul>
                                    <li>لا تزيد حجم الصورة عن 2048 ميجا</li>
                                    <li>الامتدادات المسموح بها: jpg, jpeg, png</li>
                                    <li>الابعاد المفضلة للصورة 100x100 بيكسل</li>
                                </ul>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark">تغيير صورة الملف الشخصيس</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Personal informations card --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h6>تعديل البيانات الشخصية</h6>
                </div>
                <div class="col-md-8">
                    <form action="" method="">
                        <div class="mb-3">
                            <label for="name" class="form-lable">اسم المستخدم</label>
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark">تغيير صورة الملف الشخصيس</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
