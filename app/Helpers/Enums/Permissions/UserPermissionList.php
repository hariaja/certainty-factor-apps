<?php

namespace App\Helpers\Enums\Permissions;

class UserPermissionList
{
  public static function permissions()
  {
    // Give permission to roles user order by route name
    return [
      'users.show',
      'users.update',
      'users.password',
    ];
  }
}
