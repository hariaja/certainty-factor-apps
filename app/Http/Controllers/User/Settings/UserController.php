<?php

namespace App\Http\Controllers\User\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
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
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('users.settings.users.show', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserRequest $request, User $user)
  {
    $this->userService->handleUpdateData($request, $user->id);
    return redirect(route('users.home'))->withSuccess('Berhasil Mengubah Informasi Data Diri Anda');
  }
}
