<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $items = [
      [
        'name' => 'Pasti',
        'point' => 1,
      ],
      [
        'name' => 'Hampir Pasti',
        'point' => 0.8,
      ],
      [
        'name' => 'Mungkin',
        'point' => 0.6,
      ],
      [
        'name' => 'Barang Kali',
        'point' => 0.4,
      ],
      [
        'name' => 'Tidak Tahu',
        'point' => 0.2,
      ],
      [
        'name' => 'Sangat Tidak Tahu',
        'point' => 0,
      ],
    ];

    foreach ($items as $item) :
      Degree::create($item);
    endforeach;
  }
}
