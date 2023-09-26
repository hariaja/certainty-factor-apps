<?php

namespace App\Repositories\Disturbance;

use LaravelEasyRepository\Repository;

interface DisturbanceRepository extends Repository
{
  public function getQuery();
}
