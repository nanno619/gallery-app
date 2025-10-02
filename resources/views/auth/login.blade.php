@extends('layouts.app')

@section('content')
  <div class="page page-center">
    <div class="container-tight container py-4">
      {{-- <div class="mb-4 text-center">
        <h1>{{ config('app.name') }}</h1>
      </div> --}}
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">Login to your account</h2>
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">{{ __('Email address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-2">
              <label for="password" class="form-label">
                Password
                <span class="form-label-description">
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" tabindex="-1">I forgot password</a>
                  @endif
                </span>
              </label>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your password">
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-2">
              <label class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="form-check-label" for="remember">{{ __('Remember me on this device') }}</span>
              </label>
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-secondary mt-3 text-center">Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a></div>
    </div>
  </div>
@endsection
