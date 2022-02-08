<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FieldSeeder;
use Database\Seeders\ArchiveSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            ArchiveSeeder::class,
            CategorySeeder::class,
            FieldSeeder::class,
            UserSeeder::class
        ]);
    }
}
