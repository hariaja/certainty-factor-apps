<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $items = [
      [
        'code' => 'G1',
        'description' => 'Kesulitan membuat pekerjaan tertulis secara terstruktur misalnya essay',
        'point' => 0.8,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G2',
        'description' => 'Huruf tertukar tukar, misal ‘b’ tertukar ‘d’,’p’ tertukar ‘q’, ‘m’ tertukar ‘w’, ‘s’ tertukar ‘z’ misalnya papa-qaqa',
        'point' => 0.8,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G3',
        'description' => 'Melihat atau merasakan gerakan gerakan yang sebenarnya tidak ada saat membaca, menulis atau menyalin',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G4',
        'description' => 'Kesulitan memahami kalimat yang dibaca ataupun yang didengar dan melelahkan',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G5',
        'description' => 'Tulis tangan yang buruk atau berantakan',
        'point' => 0.6,
        'disturbance' => 'P2,P1',
      ],
      [
        'code' => 'G6',
        'description' => 'Mengalami kesulitan mempelajari tulisan sambung',
        'point' => 0.6,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G7',
        'description' => 'Ketika mendengarkan sesuatu, rentang perhatiannya pendek',
        'point' => 0.6,
        'disturbance' => 'P1',
      ],
      [
        'code' => 'G8',
        'description' => 'Kesulitan dalam mengingat katakata atau ingatan yang buruk atau lemah terhadap informasi yang tidak pernah dialami sebelumnya',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G9',
        'description' => 'Kesulitan mengingat nama-nama',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G10',
        'description' => 'Kesulitan/lambat mengerjakan PR',
        'point' => 0.8,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G11',
        'description' => 'Kesulitan memahami konsep waktu atau kesulitan dalam menyebutkan waktu, mengatur waktu ataupun melakukan sesuatu dengan tepat waktu',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G12',
        'description' => 'Kesulitan membedakan huruf vocal dengan konsonan',
        'point' => 0.6,
        'disturbance' => 'P1',
      ],
      [
        'code' => 'G13',
        'description' => 'Mengeluh pusing atau nyeri kepala atau sakit perut saat membaca',
        'point' => 1,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G14',
        'description' => 'Kesulitan mengingat rutinitas aktivitas sehari-hari atau mencerna sesuatu secara berurutan',
        'point' => 0.4,
        'disturbance' => 'P1',
      ],
      [
        'code' => 'G15',
        'description' => 'Kesulitan membedakan kanan kiri',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G16',
        'description' => 'Membaca lambat-lambat dan terputus-putus dan tidak tepat',
        'point' => 0.8,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G17',
        'description' => 'Menghilangkan atau salah baca kata penghubung (“di”, “ke”,”pada”)',
        'point' => 0.6,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G18',
        'description' => 'Mengabaikan kata awalan pada waktu membaca (“menulis” dibaca sebagai “tulis”)',
        'point' => 0.6,
        'disturbance' => 'P2',
      ],
      [
        'code' => 'G19',
        'description' => 'Tertukar-tukar kata(misalnya : diaada, sama-masa, lagu-gula, batubuta, tanam-taman, dapat-padat, mana-nama)',
        'point' => 0.6,
        'disturbance' => 'P3',
      ],
      [
        'code' => 'G20',
        'description' => 'Ketidak akuratan dalam membaca seperti membaca lambat kata demi kata jika dibandingkan dengan anak sseusianya, intonasi suara turun naik tidak teratur',
        'point' => 0.8,
        'disturbance' => 'P1,P3',
      ],
    ];

    foreach ($items as $item) :
      Symptom::create($item);
    endforeach;
  }
}
