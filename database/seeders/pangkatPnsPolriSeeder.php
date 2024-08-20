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
        DB::table('pangkat_pns_polris')->insert([
            ['nama' => 'GOL IV', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'GOL III', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'GOL II', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'GOL I', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
