<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Helpers\Helper;
use App\Helpers\Enums\RoleType;
use Illuminate\Database\Seeder;
use App\Helpers\Enums\GenderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::create([
      'name' => 'Nur Risma Jaelani',
      'email' => 'risma@gmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt(Helper::DEFAULT_PASSWORD),
      'status' => true,
    ])->assignRole(RoleType::USER->value);

    Client::create([
      'user_id' => $user->id,
      'phone' => '62859466622',
      'gender' => GenderType::FEMALE->value,
      'place_of_birth' => 'Sukabumi',
      'date_of_birth' => '1997-10-16',
      'occupation' => 'Guru Seni & Bahasa',
    ]);
  }
}
