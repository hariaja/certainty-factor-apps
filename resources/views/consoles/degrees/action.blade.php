@can('degrees.edit')
<a href="{{ route('degrees.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.degrees.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('degrees.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-degrees" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.degrees.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
