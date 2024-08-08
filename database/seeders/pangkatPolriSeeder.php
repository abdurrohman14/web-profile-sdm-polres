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
        // Perwira Tinggi
        $perwira_tinggi_id = DB::table('pangkats')->insertGetId(['nama' => 'Perwira Tinggi']);
        DB::table('pangkats')->insert([
            ['nama' => 'Jenderal Polisi (Jend. Pol)', 'parent_id' => $perwira_tinggi_id],
            ['nama' => 'Komisaris Jenderal Polisi (Komjen Pol)', 'parent_id' => $perwira_tinggi_id],
            ['nama' => 'Inspektur Jenderal Polisi (Irjen Pol)', 'parent_id' => $perwira_tinggi_id],
            ['nama' => 'Brigadir Jenderal Polisi (Brigjen Pol)', 'parent_id' => $perwira_tinggi_id],
        ]);

        // Perwira Menengah
        $perwira_menengah_id = DB::table('pangkats')->insertGetId(['nama' => 'Perwira Menengah']);
        DB::table('pangkats')->insert([
            ['nama' => 'Komisaris Besar Polisi (Kombes Pol)', 'parent_id' => $perwira_menengah_id],
            ['nama' => 'Ajun Komisaris Besar Polisi (AKBP)', 'parent_id' => $perwira_menengah_id],
            ['nama' => 'Komisaris Polisi (Kompol)', 'parent_id' => $perwira_menengah_id],
        ]);

        // Perwira Pertama
        $perwira_pertama_id = DB::table('pangkats')->insertGetId(['nama' => 'Perwira Pertama']);
        DB::table('pangkats')->insert([
            ['nama' => 'Ajun Komisaris Polisi (AKP)', 'parent_id' => $perwira_pertama_id],
            ['nama' => 'Inspektur Polisi Satu (Iptu)', 'parent_id' => $perwira_pertama_id],
            ['nama' => 'Inspektur Polisi Dua (Ipda)', 'parent_id' => $perwira_pertama_id],
        ]);

        // Bintara Tinggi
        $bintara_tinggi_id = DB::table('pangkats')->insertGetId(['nama' => 'Bintara Tinggi']);
        DB::table('pangkats')->insert([
            ['nama' => 'Ajun Inspektur Polisi Satu (Aiptu)', 'parent_id' => $bintara_tinggi_id],
            ['nama' => 'Ajun Inspektur Polisi Dua (Aipda)', 'parent_id' => $bintara_tinggi_id],
        ]);

        // Bintara
        $bintara_id = DB::table('pangkats')->insertGetId(['nama' => 'Bintara']);
        DB::table('pangkats')->insert([
            ['nama' => 'Brigadir Polisi Kepala (Bripka)', 'parent_id' => $bintara_id],
            ['nama' => 'Brigadir Polisi (Brippol)', 'parent_id' => $bintara_id],
            ['nama' => 'Brigadir Polisi Satu (Briptu)', 'parent_id' => $bintara_id],
            ['nama' => 'Brigadir Polisi Dua (Bripda)', 'parent_id' => $bintara_id],
        ]);

        // Tamtama
        $tamtama_id = DB::table('pangkats')->insertGetId(['nama' => 'Tamtama']);
        DB::table('pangkats')->insert([
            ['nama' => 'Ajun Brigadir Polisi (Abrippol)', 'parent_id' => $tamtama_id],
            ['nama' => 'Ajun Brigadir Polisi Satu (Abriptu)', 'parent_id' => $tamtama_id],
            ['nama' => 'Ajun Brigadir Polisi Dua (Abripda)', 'parent_id' => $tamtama_id],
            ['nama' => 'BhayangKara Kepala (Bharaka)', 'parent_id' => $tamtama_id],
            ['nama' => 'BhayangKara Satu (Bharatu)', 'parent_id' => $tamtama_id],
            ['nama' => 'BhayangKara Dua (Bharada)', 'parent_id' => $tamtama_id],
        ]);
    }
}
