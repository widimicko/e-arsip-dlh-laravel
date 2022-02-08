<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Bidang A',
            'email' => 'admin_a@gmail.com',
            'role' => 'A',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Bidang B',
            'email' => 'admin_b@gmail.com',
            'role' => 'B',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Bidang C',
            'email' => 'admin_c@gmail.com',
            'role' => 'C',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin Bidang D',
            'email' => 'admin_D@gmail.com',
            'role' => 'D',
            'password' => Hash::make('password'),
        ]);
    }
}
