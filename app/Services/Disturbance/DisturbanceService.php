<?php

namespace App\Services\Disturbance;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface DisturbanceService extends BaseService
{
  public function getQuery();
  public function handleCreateData(Request $request);
  public function handleUpdateData(Request $request, int $id);
}
