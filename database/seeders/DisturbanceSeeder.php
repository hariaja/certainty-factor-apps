<?php

namespace Database\Seeders;

use App\Models\Disturbance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisturbanceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $datas = [
      [
        'code' => 'P1',
        'name' => 'Disleksia Auditori',
        'description' => 'Disleksia yang menyerang bagian saraf-saraf pendengaran dan bagian otak yang bertugas menerjemahkan bunyi. Hal ini yang menyebabkan penderitanya tidak bisa mengaitkan suatu huruf dengan bunyi yang dimilikinya secara tepat.',
      ],
      [
        'code' => 'P2',
        'name' => 'Disleksia Visual',
        'description' => 'Disleksia ini adalah lemahnya kemampuan mata dalam membaca serta lemahnya kemampuan otak dalam menerjemahkan huruf-huruf menyebabkan penderitanya kesulitan dalam memahami tulisan.',
      ],
      [
        'code' => 'P3',
        'name' => 'Disleksia Kombinasi',
        'description' => 'Disleksia ini merupakan kombinasi dari Disleksia Auditori dan Disleksia Visual.',
      ],
    ];

    foreach ($datas as $data) :
      Disturbance::firstOrCreate($data);
    endforeach;
  }
}
