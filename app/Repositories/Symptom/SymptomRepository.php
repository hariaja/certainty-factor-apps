<?php

namespace App\Repositories\Symptom;

use LaravelEasyRepository\Repository;

interface SymptomRepository extends Repository
{
  public function getQuery();
}
