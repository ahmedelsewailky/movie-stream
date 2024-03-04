{{-- Extend master auth layout --}}
@extends('layouts.auth')

{{-- Page content --}}
@section('content')
    <div class="auth-form absolute-position">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">البريد الإلكتروني</label>
                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login"
                    value="{{ old('login') }}" autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-md-end">كلمة المرور</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-check-label" for="remember">
                    <input class="form-check-input me-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    تذكرني علي هذا الجهاز
                </label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-dark">تسجيل الدخول</button>
            </div>
        </form>
    </div>
@endsection
