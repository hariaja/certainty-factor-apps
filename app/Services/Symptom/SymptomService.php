<?php

namespace App\Services\Symptom;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface SymptomService extends BaseService
{
  public function getQuery();
  public function handleCreateData(Request $request);
  public function handleUpdateData(Request $request, int $id);
}
