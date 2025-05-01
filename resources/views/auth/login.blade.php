@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-6">
        <div class="card border border-black border-3">
            <div class="card-body p-5">
                <h2 class="text-center mb-4 fw-bold text-dark">{{ __('Welcome Back!') }}</h2>
                <p class="text-center text-muted mb-5">Login to continue exploring stories and knowledge.</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" 
                               class="form-control rounded-1 border border-black border-3 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                        <input id="password" type="password" 
                               class="form-control rounded-1 border border-black border-3 @error('password') is-invalid @enderror" 
                               name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input border-black border-2" type="checkbox" 
                                   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="small text-decoration-none text-muted" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn fw-semibold py-1" style="background-color: #EFD401; border: 3px solid black;">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="text-center small">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-dark fw-semibold text-decoration-underline">
                            Sign up
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
