<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatans')->insert([
            ['nama' => 'KAPOLRESTA', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'WAKAPOLRESTA', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BAGOPS', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BAGREN', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BAG SDM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BAG LOG', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIWAS', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIPROMAM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIHUMAS', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIKUM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SI TIK', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIUM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SPKT', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATINTELKAM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATRESKIM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATRESNARKOBA', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATBINMAS', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATSAMAPTA', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATLANTAS', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATPAMOBVIT', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATPOLAIRUD', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SATTAHTI', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIKEU', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'SIDOKKES', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
