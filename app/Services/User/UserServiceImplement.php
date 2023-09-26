<?php

namespace App\Services\User;

use App\Helpers\Helper;
use InvalidArgumentException;
use App\Helpers\Enums\DecideType;
use App\Helpers\Enums\RoleType;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Repositories\User\UserRepository;
use App\Repositories\Client\ClientRepository;
use Illuminate\Support\Facades\Hash;

class UserServiceImplement extends Service implements UserService
{
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected UserRepository $mainRepository,
    protected ClientRepository $clientRepository,
  ) {
    // 
  }

  public function getquery()
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

  public function getUserByRoleName($name)
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getUserByRoleName($name);
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
      // Tangkap Request yang tervalidasi
      $data = $request->validated();

      // Cari user berdasarkan id
      $user = $this->mainRepository->findOrFail($id);

      // Handle jika ada perubahan avatar
      $avatar = Helper::uploadFile($request, "images/users", $user->avatar);

      // Siapkan data yang akan diubah
      $data['avatar'] = $avatar;

      $this->mainRepository->update($id, $data);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }

  public function handleChangeStatus($id)
  {
    try {
      DB::beginTransaction();
      // Find User
      $user = $this->findOrFail($id);

      $newStatus = ($user->status == DecideType::YES->value) ? DecideType::NO->value : DecideType::YES->value;

      // Change Status
      $this->mainRepository->update($id, [
        'status' => $newStatus,
      ]);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }

  public function handleDeleteData($id)
  {
    try {
      DB::beginTransaction();

      // Handle delete avatar
      $user = $this->mainRepository->findOrFail($id);

      if ($user->userHasAvatar()) :
        Storage::delete($user->avatar);
      endif;

      if ($user->client) :
        $this->clientRepository->delete($user->client->id);
      endif;

      $this->mainRepository->delete($user->id);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
  }

  public function handleUserRegister($request)
  {
    DB::beginTransaction();
    try {

      // Handle Upload Avatar
      $avatar = Helper::uploadFile($request, "images/users", null);

      $payload = $request->validated();
      $payload['avatar'] = $avatar;
      $payload['password'] = Hash::make($request->password);

      // Create data to users table
      $user = $this->mainRepository->create($payload);
      $user->assignRole(RoleType::USER->value);

      // Payload client
      $insert = [
        'user_id' => $user->id,
        'phone' => $payload['phone'],
        'gender' => $payload['gender'],
        'place_of_birth' => $payload['place_of_birth'],
        'date_of_birth' => $payload['date_of_birth'],
        'occupation' => $payload['occupation'],
      ];

      // Insert data to clients table
      $this->clientRepository->create($insert);
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('session.log.error'));
    }
    DB::commit();
    return $user;
  }
}
