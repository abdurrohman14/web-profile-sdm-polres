<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pangkatPolriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pangkats')->insert([
            ['nama' => 'Perwira Menengah', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Perwira Pertama', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Bintara Tinggi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Bintara', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tamtama', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gol IV', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gol III', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gol II', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gol I', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
