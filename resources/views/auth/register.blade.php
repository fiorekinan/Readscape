@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-6">
        <div class="card border border-black border-3">
            <div class="card-body p-5">
                <h2 class="text-center mb-4 fw-bold text-dark">{{ __('Create Account') }}</h2>
                <p class="text-center text-muted mb-5">Fill in the details to create your new account.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">{{ __('Name') }}</label>
                        <input id="name" type="text" 
                               class="form-control rounded-1 border border-black border-3 @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input id="email" type="email" 
                               class="form-control rounded-1 border border-black border-3 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email">
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
                               name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" 
                               class="form-control rounded-1 border border-black border-3" 
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn fw-semibold py-1" style="background-color: #EFD401; border: 3px solid black;">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center small">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-dark fw-semibold text-decoration-underline">
                            Login
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
