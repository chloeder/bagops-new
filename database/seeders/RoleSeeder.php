<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $role = ['Admin', 'Operator'];

    foreach ($role as $r) {
      Role::create([
        'nama' => $r,
      ]);
    }
  }
}
