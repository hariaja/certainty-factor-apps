<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Traits\HandleChangePassword;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
  use HandleChangePassword;
}
