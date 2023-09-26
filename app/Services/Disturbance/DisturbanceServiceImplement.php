<?php

namespace App\Services\Disturbance;

use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use App\Repositories\Disturbance\DisturbanceRepository;

class DisturbanceServiceImplement extends Service implements DisturbanceService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected DisturbanceRepository $mainRepository
  ) {
    //
  }

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
