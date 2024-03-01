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
    <section class="mt-5">
        <div class="row">
            <div class="col-md-4">
                <h6>تغيير صورة الملف الشخصي</h6>
                <p class="small mt-3 lh-lg">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                </p>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profile.update.avatar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <img src="{{ $auth->image ? asset('storage') . '/' . $auth->image : 'https://via.placeholder.com/100' }}"
                                width="100" height="100" class="rounded-circle" alt="{{ $auth->name }}">
                            <div class="my-3">
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @else
                                    <ul class="mt-3 lh-lg">
                                        <li>لا تزيد حجم الصورة عن 2048 ميجا</li>
                                        <li>الامتدادات المسموح بها: jpg, jpeg, png</li>
                                        <li>الابعاد المفضلة للصورة 100x100 بيكسل</li>
                                    </ul>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">تغيير صورة الملف الشخصيس</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- Personal informations card --}}
    <section class="mt-3 border-top pt-3">
        <div class="row">
            <div class="col-md-4">
                <h6>تعديل البيانات الشخصية</h6>
                <p class="small mt-3 lh-lg">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                </p>
            </div>
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('profile.update.personal') }}" method="post">
                            @csrf
                            {{-- name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">اسمك</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $auth->name }}">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- username --}}
                            <div class="mb-3">
                                <label for="username" class="form-label">اسم المستخدم</label>
                                <input type="text" name="username" id="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ $auth->username }}">
                                @error('username')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني <i
                                        class="bx bxs-{{ $auth->email_verified_at ? 'check-circle text-success' : 'x-circle text-danger' }}"></i></label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ $auth->email }}">
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @else
                                    <p class="small text-danger mt-1">عند تغيير البريد الإلكتروني فستحتاج إلي التحقق من البريد
                                        الجديد</p>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">حفظ التغيرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Password card --}}
    <section class="mt-3 border-top pt-3">
        <div class="row">
            <div class="col-md-4">
                <h6> إعادة تعيين كلمة المرور</h6>
                <p class="small mt-3 lh-lg">
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                </p>
            </div>
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('profile.update.password') }}" method="post">
                            @csrf
                            {{-- password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">كلمة المرور الجديدة</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- comfirm password --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">تغيير كلمة المرور</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
