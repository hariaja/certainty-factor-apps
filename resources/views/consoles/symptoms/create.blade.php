@extends('layouts.app')
@section('title')
{{ trans('page.symptoms.title') }}
@endsection
@section('hero')
<div class="content content-full">
  <div class="content-heading">
    <div class="d-flex justify-content-between align-items-sm-center">
      {{ trans('page.symptoms.title') }}
      <a href="{{ route('symptoms.index') }}" class="btn btn-sm btn-block-option text-danger">
        <i class="fa fa-xs fa-chevron-left me-1"></i>
        {{ trans('button.back') }}
      </a>
    </div>
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('symptoms.create') }}
    </nav>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.symptoms.create') }}
    </h3>
  </div>
  <div class="block-content block-content-full">
    <form action="{{ route('symptoms.store') }}" method="POST" onsubmit="return disableSubmitButton()">
      @csrf

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="mb-4">
            <label class="form-label" for="code">{{ trans('Kode') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror" placeholder="{{ __('Kode') }}" required>
            <small class="text-muted">
              <em>{{ trans('etc. G1,G2') }}</em>
            </small>
            @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="description" class="form-label">{{ trans('Deskripsi') }}</label>
            <span class="text-danger">*</span>
            <textarea name="description" id="description" rows="5" cols="30" class="form-control @error('description') is-invalid @enderror" placeholder="{{ trans('Deskripsi') }}">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label" for="point">{{ trans('Point') }}</label>
            <span class="text-danger">*</span>
            <input type="number" step="0.1" max="1" min="0" name="point" id="point" value="{{ old('point') }}" class="form-control @error('point') is-invalid @enderror" placeholder="{{ __('Point') }}" required>
            @error('point')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label" for="disturbance">{{ trans('Gejala') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="disturbance" id="disturbance" value="{{ old('disturbance') }}" class="form-control @error('disturbance') is-invalid @enderror" placeholder="{{ __('Gejala') }}" required>
            <small class="text-muted">
              <em>{{ trans('etc. P1,P2') }}</em>
            </small>
            @error('disturbance')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100" id="submit-button">
              <i class="fa fa-fw fa-circle-check opacity-50 me-1"></i>
              {{ trans('button.create') }}
            </button>
          </div>

        </div>
      </div>

    </form>
  </div>
</div>
@endsection
