<?php

use App\Helpers\Enums\RoleType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\Settings\UserController;
use App\Http\Controllers\User\Settings\PasswordController;

$roles = implode(',', [RoleType::USER->value]);

Route::prefix('users')->name('users.')->group(function () use ($roles) {
  Route::middleware([
    'auth',
    "check.role:{$roles}",
  ])->group(function () {
    // Beranda Pendonor
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Settings Page
    Route::prefix('settings')->group(function () {
      // User management.
      Route::resource('users', UserController::class)->only(
        'update',
        'show',
      );
    });

    // Management password users.
    Route::get('users/password/{user}', [PasswordController::class, 'showChangePasswordForm'])->name('users.password');
    Route::post('users/password', [PasswordController::class, 'store']);
  });
});
