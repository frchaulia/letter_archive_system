<?php

namespace Database\Seeders;

use App\Models\LetterCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LetterCategory::insert([
            ['name' => 'Undangan'],
            ['name' => 'Pengumuman'],
            ['name' => 'Nota Dinas'],
            ['name' => 'Pemberitahuan'],
            ['name' => 'Surat Keputusan'],
            ['name' => 'Surat Edaran'],
            ['name' => 'Surat Perintah'],
            ['name' => 'Lainnya'],
        ]);
    }
}
