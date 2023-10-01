<?php

namespace App\Services\Symptom;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use LaravelEasyRepository\Service;
use App\Repositories\Symptom\SymptomRepository;

class SymptomServiceImplement extends Service implements SymptomService
{
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(SymptomRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  // Define your custom methods :)

  /**
   * return default query
   */
  public function getQuery()
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getQuery();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }

  public function handleCreateData($request)
  {
    try {
      DB::beginTransaction();
      // Handle Create Data
      $payload = $request->validated();
      $payload['code'] = strtoupper($request->code);

      $this->mainRepository->create($payload);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }

  public function handleUpdateData($request, $id)
  {
    try {
      DB::beginTransaction();

      // Handle Update Data
      $payload = $request->validated();
      $payload['code'] = strtoupper($request->code);

      $this->mainRepository->update($id, $payload);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }
}
