@extends('user.app')

@section('css')
<style type="text/css">
    .login {
        cursor: pointer;
        font-weight: bold;
        letter-spacing: 2px;
        font-size: 30px;
    }
</style>
@endsection

@section('title', __('front.login'))

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 450px;">
        <h3 class="text-center mb-4 login">{{ __('front.login') }}</h3>

        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('front.email') }}</label>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="{{ __('front.email') }}">

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('front.password') }}</label>
                <input id="password" type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('front.password') }}" required autocomplete="current-password">

                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">{{ __('front.login') }}</button>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('register') }}">{{ __('front.notRegister') }} ?</a>
            </div>

    </div>

    </form>
</div>
</div>
@endsection