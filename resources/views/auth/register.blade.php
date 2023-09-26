@extends('layouts.guest')
@section('title', trans('Buat Akun Baru'))
@section('content')
{{-- <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="row mb-3">
      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

      <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

      <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

      <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

      <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div> --}}

<div class="bg-gd-sea">
  <div class="hero-static content content-full bg-body-extra-light">
    <!-- Header -->
    <div class="py-4 px-1 text-center mb-4">
      <img src="{{ asset('assets/images/logos/logos.png') }}" alt="Login Logo" width="40%">
      <h1 class="h3 fw-bold mt-5 mb-2">{{ trans('Buat Akun Baru') }}</h1>
      <h2 class="h5 fw-medium text-muted mb-0">{{ trans('Silahkan lengkapi formulir di bawah ini untuk membuat akun.') }}</h2>
    </div>
    <!-- END Header -->

    <!-- Form Body -->
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" onsubmit="return disableSubmitButton()">
      @csrf

      <div class="row justify-content-center px-1">
        <div class="col-sm-8 col-md-6 col-xl-7">

          <div class="block block-bordered block-rounded mb-4">
            <div class="block-header">
              <h3 class="block-title">
                {{ trans('Informasi Data Diri') }}
              </h3>
            </div>
            <div class="block-content">

              <div class="form-floating mb-4">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" onkeypress="return onlyLetter(event)" placeholder="{{ trans('Nama Lengkap') }}">
                <label for="name" class="form-label">{{ trans('Nama Lengkap') }}</label>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-4">
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" oninput="formatPhoneNumber()" placeholder="{{ trans('Masukkan no. Telepon') }}">
                <label for="phone" class="form-label">{{ trans('No. Telepon') }}</label>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-4">
                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" aria-label="Floating label select gender">
                  <option selected disabled>{{ trans('Pilih Salah Satu') }}</option>
                  @foreach ($genders as $gender)
                  <option value="{{ $gender }}" @if(old('gender')===$gender) selected @endif>{{ ucfirst($gender) }}</option>
                  @endforeach
                </select>
                @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label class="form-label" for="gender">{{ trans('Jenis Kelamin') }}</label>
              </div>

              <div class="row">
                <div class="col-md-7">
                  <div class="form-floating mb-4">
                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}" onkeypress="return hanyaHuruf(event)" placeholder="{{ trans('Tempat Lahir') }}">
                    @error('place_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="place_of_birth" class="form-label">{{ trans('Tempat Lahir') }}</label>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-floating mb-4">
                    <input type="text" class="js-flatpickr form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" min="{{ date('Y-m-d') }}" placeholder="{{ trans('Select Tanggal Lahir') }}" value="{{ old('date_of_birth') }}">
                    <label for="date_of_birth" class="form-label">{{ trans('Tanggal Lahir') }}</label>
                    @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-floating mb-4">
                <input type="text" name="occupation" id="occupation" class="form-control @error('occupation') is-invalid @enderror" value="{{ old('occupation') }}" onkeypress="return hanyaHuruf(event)" placeholder="{{ trans('Pekerjaan Saat Ini') }}">
                @error('occupation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="occupation" class="form-label">{{ trans('Pekerjaan Saat Ini') }}</label>
              </div>

              <div class="mb-4">
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <label class="form-label">{{ trans('button.image') }}</label>
                  </div>
                  <div class="block-content">
                    <div class="push">
                      <img class="img-prev img-profile-center" src="{{ asset('assets/images/placeholders/default-avatar.png') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label" for="image">{{ trans('Upload Avatar') }}</label>
                <input class="form-control form-control-lg @error('avatar') is-invalid @enderror" type="file" accept="image/*" id="image" name="file" onchange="return previewImage()">
                @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" required>
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

              <div class="form-floating mb-4">
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ trans('Konfirmasi Password') }}">
                <label for="password_confirmation" class="form-label">{{ trans('Konfirmasi Password') }}</label>
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            </div>
          </div>

          <div class="row g-sm mb-4">
            <div class="col-12">
              <div class="text-center my-4">
                <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold" id="submit-button">
                  {{ trans('Daftar Sekarang') }}
                </button>
              </div>
            </div>
            <div class="my-3">
              <div class="divider-container">
                <div class="divider-line"></div>
                <div class="divider-text fw-bold">{{ trans('Atau') }}</div>
                <div class="divider-line"></div>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('login') }}" class="link-fx fw-bold">{{ trans('Masuk ke Aplikasi') }}</a>
            </div>
          </div>

        </div>
      </div>

    </form>
    <!-- END Form Body -->

  </div>
</div>
@endsection
