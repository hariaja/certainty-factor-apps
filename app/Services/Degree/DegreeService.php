<?php

namespace App\Services\Degree;

use LaravelEasyRepository\BaseService;

interface DegreeService extends BaseService
{
  public function getQuery();
}
