@extends('layouts.guest')
@section('title', trans('Masuk Aplikasi'))
@section('content')
<div class="bg-gd-sea">
  <div class="hero-static content content-full bg-body-extra-light">
    <!-- Header -->
    <div class="py-4 px-1 text-center mb-4">
      <img src="{{ asset('assets/images/logos/logos.png') }}" alt="Login Logo" width="40%">
      <h1 class="h3 fw-bold mt-5 mb-2">{{ trans('Masuk Aplikasi') }}</h1>
      <h2 class="h5 fw-medium text-muted mb-0">{{ trans('Masuk dengan menggunakan email dan password anda.') }}</h2>
    </div>
    <!-- END Header -->

    <!-- Form Body -->
    <div class="row justify-content-center px-1">
      <div class="col-sm-8 col-md-6 col-xl-4">
        <form action="{{ route('login') }}" method="POST" onsubmit="return disableSubmitButton()">
          @csrf

          <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ trans('Email') }}" required>
            <label class="form-label" for="email">{{ trans('Email') }}</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating mb-4 password-form">
            <i class="icon far fa-eye-slash fa-lg toggle-password"></i>
            <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
            <label class="form-label" for="password">{{ trans('Password') }}</label>
          </div>

          <div class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">{{ trans('Ingat Saya') }}</label>
            </div>
            <div class="fw-semibold fs-sm py-1">
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">{{ trans('Lupa Kata Sandi?') }}</a>
              @endif
            </div>
          </div>

          <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold" id="submit-button">
            {{ trans('Masuk Aplikasi') }}
          </button>

        </form>
      </div>
    </div>
    <!-- END Form Body -->

  </div>
</div>
@endsection
