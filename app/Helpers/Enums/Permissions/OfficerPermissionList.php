<?php

namespace App\Helpers\Enums\Permissions;

class OfficerPermissionList
{
  public static function permissions()
  {
    // Give permission to roles officer order by route name
    return [
      'users.show',
      'users.update',
      'users.password',
    ];
  }
}
