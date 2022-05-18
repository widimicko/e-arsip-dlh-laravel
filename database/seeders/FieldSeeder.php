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
            'name' => 'Penataan, Pengawasan dan Peningkatan Kapasitas Lingkungan Hidup'
        ]);

        Field::create([
            'name' => 'Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup'
        ]);
        
        Field::create([
            'name' => 'Pengelolaan Sampah dan Limbah Bahan Berbahaya dan Beracun'
        ]);

        Field::create([
            'name' => 'Sekretariat'
        ]);
    }
}
