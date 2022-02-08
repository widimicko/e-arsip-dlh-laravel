<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Field::create([
            'name' => 'A'
        ]);

        Field::create([
            'name' => 'B'
        ]);
        
        Field::create([
            'name' => 'C'
        ]);

        Field::create([
            'name' => 'D'
        ]);
    }
}
