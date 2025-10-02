@extends('layouts.app')

@section('content')
  <div class="page page-center">
    <div class="container-tight container py-4">
      {{-- <div class="mb-4 text-center">
        <h1>{{ config('app.name') }}</h1>
      </div> --}}
      <form class="card card-md" method="POST" action="{{ route('register') }}" autocomplete="off" novalidate>
        @csrf
        <div class="card-body">
          <h2 class="h2 mb-4 text-center">{{ __('Create new account') }}</h2>
          <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter name">
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
            <div>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">{{ __('Create new account') }}</button>
          </div>
        </div>
      </form>
      <div class="text-secondary mt-3 text-center">Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a></div>
    </div>
  </div>
@endsection
