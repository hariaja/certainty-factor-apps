@extends('layouts.app')
@section('title', trans('page.degrees.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.degrees.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('degrees.index') }}
    </nav>
  </h2>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.degrees.index') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="mb-4">
      @can('degrees.create')
      <a href="{{ route('degrees.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus fa-xs me-1"></i>
        {{ trans('page.degrees.create') }}
      </a>
      @endcan
    </div>

    <div class="my-3">
      {{ $dataTable->table() }}
    </div>

  </div>
</div>

@includeIf('consoles.degrees.show')
@endsection
@push('javascript')
{{ $dataTable->scripts() }}
@vite('resources/js/consoles/master/degrees/index.js')
<script>
  var urlDestroy = "{{ route('degrees.destroy', ':uuid') }}"

</script>
@endpush
