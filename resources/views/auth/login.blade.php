@extends('layouts.auth')

@section('content')
<div class="auth-layout">
    <div class="auth-section">
         <div class="text-center mb-4">
                <a href="."><img src="{{ asset('img/logo.png') }}" height="70" alt=""></a>
            </div>
        <form method="POST" action="{{ route('login') }}" autocomplete="off" class="card card-md">
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">{{ __('auth.login') }}</h2>

            <div class="mb-3">
            <label class="form-label">{{ __('auth.fields.email') }}</label>
            <input class="form-control" type="email" name="email" placeholder="{{ __('auth.placeholder.email') }}"
                value="{{ old('email') }}" required autofocus tabindex="1" />
            </div>

            <div class="mb-2">
            <label class="form-label">
                {{ __('auth.fields.password') }}
                @if(Route::has('password.request'))
                <span class="form-label-description">
                <a href="{{ route('password.request') }}">{{ __('auth.placeholder.forgotpassword') }}</a>
                </span>
                @endif
            </label>
            <div class="input-group input-group-flat">
                <input class="form-control" type="password" name="password" placeholder="{{ __('auth.placeholder.password') }}"
                value="{{ old('password') }}" required tabindex="2" />
                <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="12" cy="12" r="2" />
                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                </a>
                </span>
            </div>
            </div>

            {{-- <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" tabindex="3" />
                        <span class="form-check-label">{{ __('auth.rememberme') }}</span>
            </label>
        </div> --}}
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('auth.loginbutton') }}</button>
        </div>
        </div>
        </form>

        {{-- @if(Route::has('register')) --}}
        <div class="text-center text-muted mt-3">
        <a href="{{ route('register') }}" tabindex="-1">{{ __('auth.createaccount') }}</a>
        </div>
        {{-- @endif --}}
    </div>
</div>
@endsection
