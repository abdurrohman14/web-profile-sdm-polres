<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_jabatans')->insert([
            // Bagops
            ['jabatan_id' => 3, 'nama' => 'Subbag Binops', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 3, 'nama' => 'Subbag Dalops', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 3, 'nama' => 'Subbag Kerma', 'created_at' => now(), 'updated_at' => now()],
            // Bagren
            ['jabatan_id' => 4, 'nama' => 'Subbag Renprogar', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 4, 'nama' => 'Subbag Dalprogar', 'created_at' => now(), 'updated_at' => now()],
            // Bagsdm
            ['jabatan_id' => 5, 'nama' => 'Subbag Binkar', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 5, 'nama' => 'Subbag Dalpers', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 5, 'nama' => 'Subbag Watpers', 'created_at' => now(), 'updated_at' => now()],
            // Baglog
            ['jabatan_id' => 6, 'nama' => 'Subbag Bekpal', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 6, 'nama' => 'Subbag Faskon', 'created_at' => now(), 'updated_at' => now()],
            // Siwas
            ['jabatan_id' => 7, 'nama' => 'Subsiopsnal', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 7, 'nama' => 'Subsibin', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 7, 'nama' => 'Subsidumas', 'created_at' => now(), 'updated_at' => now()],
            // Sipromam
            ['jabatan_id' => 8, 'nama' => 'Unit Propam', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 8, 'nama' => 'Unit Paminal', 'created_at' => now(), 'updated_at' => now()],
            // Sihumas
            ['jabatan_id' => 9, 'nama' => 'Subsi PIDM', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 9, 'nama' => 'Subsipenmas', 'created_at' => now(), 'updated_at' => now()],
            // Sikum
            ['jabatan_id' => 10, 'nama' => 'Subsibankum', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 10, 'nama' => 'Subsiluhkum', 'created_at' => now(), 'updated_at' => now()],
            // Sitik
            ['jabatan_id' => 11, 'nama' => 'Subsitekkom', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 11, 'nama' => 'Subsitekinfo', 'created_at' => now(), 'updated_at' => now()],
            // Sium
            ['jabatan_id' => 12, 'nama' => 'Subsimintu', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 12, 'nama' => 'Subsiyanma', 'created_at' => now(), 'updated_at' => now()],
            // Sikeu
            ['jabatan_id' => 23, 'nama' => 'Subsigaji', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 23, 'nama' => 'Subsiverif', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 23, 'nama' => 'Subsiapk', 'created_at' => now(), 'updated_at' => now()],
            // Sidokkes
            ['jabatan_id' => 24, 'nama' => 'Subsidokpol', 'created_at' => now(), 'updated_at' => now()],
            ['jabatan_id' => 24, 'nama' => 'Subsikespol', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
