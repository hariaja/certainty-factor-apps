@can('symptoms.edit')
<a href="{{ route('symptoms.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.symptoms.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('symptoms.show')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-modern me-1 show-symptoms" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.symptoms.show') }}"><i class="fa fa-sm fa-eye"></i></a>
@endcan
@can('symptoms.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-symptoms" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.symptoms.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
