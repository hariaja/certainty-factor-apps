<?php

namespace App\Repositories\Disturbance;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Disturbance;

class DisturbanceRepositoryImplement extends Eloquent implements DisturbanceRepository
{
  /**
   * Model class to be used in this repository for the common methods inside Eloquent
   * Don't remove or change $this->model variable name
   * @property Model|mixed $model;
   */
  protected $model;

  public function __construct(Disturbance $model)
  {
    $this->model = $model;
  }

  public function getQuery()
  {
    return $this->model->query();
  }
}
