@can('disturbances.edit')
<a href="{{ route('disturbances.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.disturbances.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('disturbances.show')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-modern me-1 show-disturbances" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.disturbances.show') }}"><i class="fa fa-sm fa-eye"></i></a>
@endcan
@can('disturbances.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-disturbances" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.disturbances.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
