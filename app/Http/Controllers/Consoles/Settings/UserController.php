<?php

namespace App\Http\Controllers\Consoles\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\Enums\DecideType;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\DataTables\Scopes\StatusAccountFilter;
use App\DataTables\Consoles\Settings\UserDataTable;
use App\Http\Requests\Consoles\Settings\UserRequest;

class UserController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected UserService $userService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(UserDataTable $dataTable, Request $request)
  {
    $statusUserTypes = DecideType::toArray();

    return $dataTable->addScopes([
      new StatusAccountFilter($request),
    ])->render('consoles.settings.users.index', compact('statusUserTypes'));
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('consoles.settings.users.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function status(User $user)
  {
    $this->userService->handleChangeStatus($user->id);
    return response()->json([
      'message' => trans('session.status'),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserRequest $request, User $user)
  {
    $this->userService->handleUpdateData($request, $user->id);
    return redirect(route('users.show', me()->uuid))->withSuccess(trans('Berhasil Memperbaharui Profil Anda'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $this->userService->handleDeleteData($user->id);
    return response()->json([
      'message' => trans('session.delete'),
    ]);
  }
}
