<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pangkatPnsPolriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gol IV
        $golIV_Id = DB::table('pangkat_pns_polris')->insertGetId(['nama' => 'GOL IV']);
        DB::table('pangkat_pns_polris')->insert([
            ['nama' => 'Pembina Utama / Gol IV E', 'parent_id' => $golIV_Id],
            ['nama' => 'Pembina Utama Madya / Gol IV D', 'parent_id' => $golIV_Id],
            ['nama' => 'Pembina Utama Muda / Gol IV C', 'parent_id' => $golIV_Id],
            ['nama' => 'Pembina Tingkat I / Gol IV B', 'parent_id' => $golIV_Id],
            ['nama' => 'Pembina / Gol IV A', 'parent_id' => $golIV_Id],
        ]);

        // Gol III
        $golIII_Id = DB::table('pangkat_pns_polris')->insertGetId(['nama' => 'GOL III']);
        DB::table('pangkat_pns_polris')->insert([
            ['nama' => 'Penata Tingkat I / Gol III D', 'parent_id' => $golIII_Id],
            ['nama' => 'Penata / Gol III C', 'parent_id' => $golIII_Id],
            ['nama' => 'Penata Muda Tingkat I / Gol III B', 'parent_id' => $golIII_Id],
            ['nama' => 'Penata Muda / Gol III A', 'parent_id' => $golIII_Id],
        ]);

        // Gol II
        $golII_Id = DB::table('pangkat_pns_polris')->insertGetId(['nama' => 'GOL II']);
        DB::table('pangkat_pns_polris')->insert([
            ['nama' => 'Pengatur Tingkat I / Gol II D', 'parent_id' => $golII_Id],
            ['nama' => 'Pengatur / Gol II C', 'parent_id' => $golII_Id],
            ['nama' => 'Pengatur Muda Tingkat I / Gol II B', 'parent_id' => $golII_Id],
            ['nama' => 'Pengatur Muda / Gol II A', 'parent_id' => $golII_Id],
        ]);

        // Gol I
        $golI_Id = DB::table('pangkat_pns_polris')->insertGetId(['nama' => 'GOL I']);
        DB::table('pangkat_pns_polris')->insert([
            ['nama' => 'Juru Tingkat I / Gol I D', 'parent_id' => $golI_Id],
            ['nama' => 'Juru / Gol I C', 'parent_id' => $golI_Id],
            ['nama' => 'Juru Muda Tingkat I / Gol I B', 'parent_id' => $golI_Id],
            ['nama' => 'Juru Muda / Gol A', 'parent_id' => $golI_Id],
        ]);
    }
}
