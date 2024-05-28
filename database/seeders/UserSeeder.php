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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('maulana123'),
            'akses' => 1,
            'status' => 1,
        ]);

        User::create([
            'name' => 'Management',
            'email' => 'management@gmail.com',
            'password' => bcrypt('management123'),
            'akses' => 2,
            'status' => 1,
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'akses' => 3,
            'status' => 1,
        ]);
    }
}
