@extends('layouts.app')
@section('title', trans('page.symptoms.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.symptoms.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('symptoms.index') }}
    </nav>
  </h2>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.symptoms.index') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="mb-4">
      @can('symptoms.create')
      <a href="{{ route('symptoms.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus fa-xs me-1"></i>
        {{ trans('page.symptoms.create') }}
      </a>
      @endcan
    </div>

    <div class="my-3">
      {{ $dataTable->table() }}
    </div>

  </div>
</div>

@includeIf('consoles.symptoms.show')
@endsection
@push('javascript')
{{ $dataTable->scripts() }}
@vite('resources/js/consoles/master/symptoms/index.js')
<script>
  var urlShowDetail = "{{ route('symptoms.show', ':uuid') }}";
  var urlDestroy = "{{ route('symptoms.destroy', ':uuid') }}"

</script>
@endpush
