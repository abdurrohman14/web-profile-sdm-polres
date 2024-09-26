<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class subPangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_pangkat_polris')->insert([
            // Perwira Menengah
            ['pangkat_id' => 1, 'nama' => 'Komisaris Besar Polisi (Kombes Pol)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 1, 'nama' => 'Ajun Komisaris Besar Polisi (AKBP)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 1, 'nama' => 'Komisaris Polisi (Kompol)', 'created_at' => now(), 'updated_at' => now()],
            // Perwira Pertama
            ['pangkat_id' => 2, 'nama' => 'Ajun Komisaris Polisi (AKP)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 2, 'nama' => 'Inspektur Polisi Satu (Iptu)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 2, 'nama' => 'Inspektur Polisi Dua (Ipda)', 'created_at' => now(), 'updated_at' => now()],
            // Bintara Tinggi
            ['pangkat_id' => 3, 'nama' => 'Ajun Inspektur Polisi Satu (Aiptu)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 3, 'nama' => 'Ajun Inspektur Polisi Dua (Aipda)', 'created_at' => now(), 'updated_at' => now()],
            // Bintara
            ['pangkat_id' => 4, 'nama' => 'Brigadir Polisi Kepala (Bripka)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 4, 'nama' => 'Brigadir Polisi (Brippol)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 4, 'nama' => 'Brigadir Polisi Satu (Briptu)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 4, 'nama' => 'Brigadir Polisi Dua (Bripda)', 'created_at' => now(), 'updated_at' => now()],
            // Tamtama
            ['pangkat_id' => 5, 'nama' => 'Ajun Brigadir Polisi (Abrippol)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 5, 'nama' => 'Ajun Brigadi Polisi Satu (Abriptu)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 5, 'nama' => 'Ajun Brigadi Polisi Dua (Abripda)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 5, 'nama' => 'BhayangKara Kepala (Bharaka)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 5, 'nama' => 'BhayangKara Satu (Bharatu)', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 5, 'nama' => 'BhayangKara Dua (Bharada)', 'created_at' => now(), 'updated_at' => now()],

            // Gol IV
            ['pangkat_id' => 6, 'nama' => 'Pembina Utama / Gol IV E', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 6, 'nama' => 'Pembina Utama Madya / Gol IV D', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 6, 'nama' => 'Pembina Utama Muda / Gol IV C', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 6, 'nama' => 'Pembina Tingkat I / Gol IV B', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 6, 'nama' => 'Pembina / Gol IV A', 'created_at' => now(), 'updated_at' => now()],
            // Gol III
            ['pangkat_id' => 7, 'nama' => 'Penata Tingkat I / Gol III D', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 7, 'nama' => 'Penata / Gol III C', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 7, 'nama' => 'Penata Muda Tingkat I / III B', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 7, 'nama' => 'Penata Muda / III A', 'created_at' => now(), 'updated_at' => now()],
            // Gol II
            ['pangkat_id' => 8, 'nama' => 'Pengatur Tingkat I / Gol II D', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 8, 'nama' => 'Pengatur / Gol II C', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 8, 'nama' => 'Pengatur Muda Tingkat I / Gol II B', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 8, 'nama' => 'Pengatur Muda / Gol II A', 'created_at' => now(), 'updated_at' => now()],
            // Gol I
            ['pangkat_id' => 9, 'nama' => 'Juru Tingkat I / Gol I D', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 9, 'nama' => 'Juru / Gol I C', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 9, 'nama' => 'Juru Muda Tingkat I / Gol I B', 'created_at' => now(), 'updated_at' => now()],
            ['pangkat_id' => 9, 'nama' => 'Juru Muda / Gol I A', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
