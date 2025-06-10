@extends('user.app')

@section('title', __('front.register'))

@section('css')
<style type="text/css">
    .register {
        cursor: pointer;
        font-weight: bold;
        letter-spacing: 2px;
        font-size: 30px;
    }
</style>
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="max-width: 600px; width: 100%;">
        <h3 class="text-center mb-4 register">{{ __('front.register') }}</h3>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">{{__('front.nameF')}}</label>
                    <input id="name" type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="{{__('front.nameF')}}">
                    @error('name') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lastname">{{__('front.lastname')}}</label>
                    <input id="lastname" type="text" name="lastname"
                        class="form-control @error('lastname') is-invalid @enderror"
                        value="{{ old('lastname') }}" placeholder="{{__('front.lastname')}}">
                    @error('lastname') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="phone">{{__('front.phone')}}</label>
                <input id="phone" type="text" name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" placeholder="{{__('front.phone')}}">
                @error('phone') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="email">{{__('front.email')}}</label>
                <input id="email" type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="{{__('front.email')}}">
                @error('email') <small class="invalid-feedback">{{ $message }}</small> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password">{{__('front.password')}}</label>
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{__('front.password')}}">
                    @error('password') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password_confirmation">{{__('front.password_confirmation')}}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="{{__('front.password_confirmation')}}">
                    @error('password_confirmation') <small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>
            </div>

            <!-- نوع الحساب -->
            <div class="mb-3">
                <label class="d-block mb-2">{{ __('front.type') }}</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type_customer"
                        value="customer" checked onchange="toggleCategories()">
                    <label class="form-check-label" for="type_customer">{{ __('front.customer') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type_provider"
                        value="provider" onchange="toggleCategories()">
                    <label class="form-check-label" for="type_provider">{{ __('front.provider') }}</label>
                </div>
                @error('type') <small class="invalid-feedback d-block">{{ $message }}</small> @enderror
            </div>

            <!-- الأقسام -->
            <div id="category-box" style="display: none;">
                <label class="d-block mb-2">{{ __('front.select_cate') }}</label>
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]"
                                id="cat{{ $category->id }}" value="{{ $category->id }}">
                            <label class="form-check-label" for="cat{{ $category->id }}">
                                {{ $category->Trans_Name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success w-100">{{ __('front.register') }}</button>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">{{ __('front.already') }}</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    function toggleCategories() {
        let type = document.querySelector('input[name="type"]:checked').value;
        document.getElementById('category-box').style.display = (type === 'provider') ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', toggleCategories);
</script>
@endsection