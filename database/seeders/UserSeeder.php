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
        User::query()->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@jitcom.net',
                'permission' => 1,
                'password' => bcrypt('adminadmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'admin2',
                'email' => 'admin2@jitcom.net',
                'permission' => 21,
                'password' => bcrypt('adminadmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 3,
                'name' => 'admin3',
                'email' => 'admin3@jitcom.net',
                'permission' => 22,
                'password' => bcrypt('adminadmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'id' => 4,
                'name' => 'admin4',
                'email' => 'admin4@jitcom.net',
                'permission' => 99,
                'password' => bcrypt('adminadmin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
