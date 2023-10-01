<?php

namespace App\Repositories\Symptom;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Symptom;

class SymptomRepositoryImplement extends Eloquent implements SymptomRepository
{
  /**
   * Model class to be used in this repository for the common methods inside Eloquent
   * Don't remove or change $this->model variable name
   * @property Model|mixed $model;
   */
  protected $model;

  public function __construct(Symptom $model)
  {
    $this->model = $model;
  }

  public function getQuery()
  {
    return $this->model->query();
  }
}
