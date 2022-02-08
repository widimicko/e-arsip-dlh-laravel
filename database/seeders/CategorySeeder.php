<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Surat Keputusan',
        ]);

        Category::create([
            'name' => 'Surat Peringatan',
        ]);

        Category::create([
            'name' => 'Laporan Keuangan',
        ]);

        Category::create([
            'name' => 'Surat Tugas',
        ]);

        Category::create([
            'name' => 'Berita Acara',
        ]);
    }
}
