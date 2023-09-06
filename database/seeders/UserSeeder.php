<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        'nama' => 'KABAG OPS',
        'username' => 'bagops01',
        'email' => 'stewardyohanes@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 1,
        'satker_id' => 1
      ],
      [
        'nama' => 'Operator BAG OPS',
        'username' => 'operatorbagops',
        'email' => 'serbaserbissdunia@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 1,
        'satker_id' => 1
      ],
      [
        'nama' => 'Operator Polsek Tondano',
        'username' => 'polsektondano',
        'email' => 'polsektondano@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 2
      ],
      [
        'nama' => 'Operator Polsek Remboken',
        'username' => 'polsekremboken',
        'email' => 'polsekremboken@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 3
      ],
      [
        'nama' => 'Operator Polsek Eris',
        'username' => 'polsekeris',
        'email' => 'polsekeris@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 4
      ],
      [
        'nama' => 'Operator Polsek Kombi',
        'username' => 'polsekkombi',
        'email' => 'polsekkombi@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 5
      ],
      [
        'nama' => 'Operator Polsek Kakas',
        'username' => 'polsekkakas',
        'email' => 'polsekkakas@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 6
      ],
      [
        'nama' => 'Operator Polsek Kawangkoan',
        'username' => 'polsekkawangkoan',
        'email' => 'polsekkawangkoan@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 7
      ],
      [
        'nama' => 'Operator Polsek Langowan',
        'username' => 'polseklangowan',
        'email' => 'polseklangowan@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 8
      ],
      [
        'nama' => 'Operator Polsek Langowan Barat',
        'username' => 'polseklangowanbarat',
        'email' => 'polseklangowanbarat@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 9
      ],
      [
        'nama' => 'Operator Polsek Lembean Timur',
        'username' => 'polseklembeantimur',
        'email' => 'polseklembeantimur@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 10
      ],
      [
        'nama' => 'Operator Polsek Toulimambot',
        'username' => 'polsektoulimambot',
        'email' => 'polsektoulimambot@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 11
      ],
      [
        'nama' => 'Operator Polsek Tompaso',
        'username' => 'polsektompaso',
        'email' => 'polsektompaso@gmail.com',
        'password' => bcrypt('rahasia1234'),
        'status' => 'active',
        'role_id' => 2,
        'satker_id' => 12
      ],

    ];

    foreach ($users as $key => $user) {
      User::create($user);
    }
  }
}
