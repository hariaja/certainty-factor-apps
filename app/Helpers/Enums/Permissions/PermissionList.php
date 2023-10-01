<?php

namespace App\Helpers\Enums\Permissions;

class PermissionList
{
  public static function listPermissions()
  {
    // Ini adalah permissions atau hak akses yang
    // diberikan berdasarkan nama route dan di kategorikan berdasarkan nama permission category

    return [
      // Halaman User
      'users.index',
      'users.create',
      'users.show',
      'users.password',
      'users.update',
      'users.destroy',

      // Halaman Role
      'roles.index',
      'roles.edit',
      'roles.update',
      'roles.destroy',

      // Halaman Disturbance
      'disturbances.index',
      'disturbances.create',
      'disturbances.store',
      'disturbances.show',
      'disturbances.edit',
      'disturbances.update',
      'disturbances.destroy',

      // Halaman Degree
      'degrees.index',
      'degrees.create',
      'degrees.store',
      'degrees.edit',
      'degrees.update',
      'degrees.destroy',

      // Halaman Symptom
      'symptoms.index',
      'symptoms.create',
      'symptoms.store',
      'symptoms.show',
      'symptoms.edit',
      'symptoms.update',
      'symptoms.destroy',
    ];
  }
}
