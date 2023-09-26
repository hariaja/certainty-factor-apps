<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{
  public function getQuery();
  public function getUserByRoleName(string $name);
  public function handleChangeStatus(int $id);
  public function handleUpdateData(Request $request, int $id);
  public function handleDeleteData(int $id);
  public function handleUserRegister(Request $request);
}
