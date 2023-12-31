@can('users.destroy')
@if ($model->hasRole(RoleType::ADMIN->value))
<span class="badge text-smooth">{{ trans('Tidak Bisa Dihapus') }}</span>
@else
@if (!$model->status)
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-2 delete-users" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.users.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@else
<span class="badge text-info">{{ trans('---') }}</span>
@endif
@endif
@endcan

@vite('resources/js/tooltip.js')
