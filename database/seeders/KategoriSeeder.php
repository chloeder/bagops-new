<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $kategori = ['Laporan Rutin', 'Laporan Non Rutin'];

    foreach ($kategori as $c) {
      Kategori::create([
        'nama' => $c,
      ]);
    }
  }
}
