@extends('layouts.app')
@section('title', trans('page.disturbances.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.disturbances.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('disturbances.index') }}
    </nav>
  </h2>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.disturbances.index') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="mb-4">
      @can('disturbances.create')
      <a href="{{ route('disturbances.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus fa-xs me-1"></i>
        {{ trans('page.disturbances.create') }}
      </a>
      @endcan
    </div>

    <div class="my-3">
      {{ $dataTable->table() }}
    </div>

  </div>
</div>

@includeIf('consoles.disturbances.show')
@endsection
@push('javascript')
{{ $dataTable->scripts() }}
@vite('resources/js/consoles/master/disturbances/index.js')
<script>
  var urlShowDetail = "{{ route('disturbances.show', ':uuid') }}";
  var urlDestroy = "{{ route('disturbances.destroy', ':uuid') }}"

</script>
@endpush
