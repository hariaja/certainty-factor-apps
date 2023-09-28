<?php

namespace App\Repositories\Degree;

use LaravelEasyRepository\Repository;

interface DegreeRepository extends Repository
{
  public function getQuery();
}
