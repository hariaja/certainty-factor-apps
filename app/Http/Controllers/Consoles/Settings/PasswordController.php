<?php

namespace App\Http\Controllers\Consoles\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\HandleChangePassword;

class PasswordController extends Controller
{
  use HandleChangePassword;
}
