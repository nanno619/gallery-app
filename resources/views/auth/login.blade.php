@extends('layouts.auth')

@section('content')
<div class="auth-split">

  {{-- LEFT PANEL: Brand + Gallery Mosaic --}}
  <div class="auth-left">
    <div class="auth-mosaic" aria-hidden="true">
      <div class="mosaic-frame mosaic-f1"></div>
      <div class="mosaic-frame mosaic-f2"></div>
      <div class="mosaic-frame mosaic-f3"></div>
      <div class="mosaic-frame mosaic-f4"></div>
      <div class="mosaic-frame mosaic-f5"></div>
      <div class="mosaic-frame mosaic-f6"></div>
      <div class="mosaic-frame mosaic-f7"></div>
    </div>

    <div class="auth-left-content">
      <div class="auth-brand">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor" class="auth-brand-icon">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M8.813 11.612c.457 -.38 .918 -.38 1.386 .011l.108 .098l4.986 4.986l.094 .083a1 1 0 0 0 1.403 -1.403l-.083 -.094l-1.292 -1.293l.292 -.293l.106 -.095c.457 -.38 .918 -.38 1.386 .011l.108 .098l4.674 4.675a4 4 0 0 1 -3.775 3.599l-.206 .005h-12a4 4 0 0 1 -3.98 -3.603l6.687 -6.69l.106 -.095zm9.187 -9.612a4 4 0 0 1 3.995 3.8l.005 .2v9.585l-3.293 -3.292l-.15 -.137c-1.256 -1.095 -2.85 -1.097 -4.096 -.017l-.154 .14l-.307 .306l-2.293 -2.292l-.15 -.137c-1.256 -1.095 -2.85 -1.097 -4.096 -.017l-.154 .14l-5.307 5.306v-9.585a4 4 0 0 1 3.8 -3.995l.2 -.005h12zm-2.99 5l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z"/>
        </svg>
        <span class="auth-brand-name">{{ config('app.name') }}</span>
      </div>

      <div class="auth-left-tagline">
        <p class="auth-tagline-main">Your visual story,<br>beautifully curated.</p>
        <p class="auth-tagline-sub">A private gallery for the photos that matter.</p>
      </div>
    </div>
  </div>

  {{-- RIGHT PANEL: Login Form --}}
  <div class="auth-right">
    <div class="auth-form-wrap">

      <div class="auth-form-header">
        <h1 class="auth-form-title">Welcome back</h1>
        <p class="auth-form-subtitle">Sign in to your gallery</p>
      </div>

      <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="auth-field">
          <label for="email" class="auth-label">Email address</label>
          <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="email"
            autofocus
            placeholder="you@example.com"
            class="auth-input @error('email') is-invalid @enderror"
          >
          @error('email')
            <span class="auth-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="auth-field">
          <div class="auth-label-row">
            <label for="password" class="auth-label">Password</label>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="auth-forgot" tabindex="-1">Forgot password?</a>
            @endif
          </div>
          <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="current-password"
            placeholder="••••••••"
            class="auth-input @error('password') is-invalid @enderror"
          >
          @error('password')
            <span class="auth-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="auth-remember">
          <label class="auth-check-label">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="auth-check-input">
            <span>Remember me on this device</span>
          </label>
        </div>

        <button type="submit" class="auth-submit">Sign in</button>
      </form>

      <p class="auth-signup-link">
        No account yet?
        @if (Route::has('register'))
          <a href="{{ route('register') }}">Create one</a>
        @endif
      </p>

    </div>
  </div>

</div>
@endsection
