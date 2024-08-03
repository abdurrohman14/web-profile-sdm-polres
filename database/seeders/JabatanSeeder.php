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
        // Unsur Pimpinan
        $kapolrestaGetId = DB::table('jabatans')->insertGetId([
            'nama' => 'KAPOLRESTA',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $wakapolrestaGetId = DB::table('jabatans')->insertGetId([
            'nama' => 'WAKAPOLRESTA',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Unsur Pengawas dan Pembantu Pimpinan
        $bagopsId = DB::table('jabatans')->insertGetId([
            'nama' => 'BAGOPS',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBBAG BINOPS',
                'parent_id' => $bagopsId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG DALOPS',
                'parent_id' => $bagopsId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG KERMA',
                'parent_id' => $bagopsId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $bagrenId = DB::table('jabatans')->insertGetId([
            'nama' => 'BAGREN',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBBAG RENPROGAR',
                'parent_id' => $bagrenId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG DALPROGAR',
                'parent_id' => $bagrenId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $bagsdmId = DB::table('jabatans')->insertGetId([
            'nama' => 'BAG SDM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBBAG BINKAR',
                'parent_id' => $bagsdmId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG DALPERS',
                'parent_id' => $bagsdmId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG WATPERS',
                'parent_id' => $bagsdmId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $baglogId = DB::table('jabatans')->insertGetId([
            'nama' => 'BAG LOG',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBBAG BEKPAL',
                'parent_id' => $baglogId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBBAG FASKON',
                'parent_id' => $baglogId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $siwasId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIWAS',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSIOPSNAL',
                'parent_id' => $siwasId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIBIN',
                'parent_id' => $siwasId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIDUMAS',
                'parent_id' => $siwasId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sipromamId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIPROMAM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'UNIT PROMAM',
                'parent_id' => $sipromamId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'UNIT PAMINAL',
                'parent_id' => $sipromamId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sihumasId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIHUMAS',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSI PIDM',
                'parent_id' => $sihumasId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIPENMAS',
                'parent_id' => $sihumasId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sikumId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIKUM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSIBANKUM',
                'parent_id' => $sikumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSILUHKUM',
                'parent_id' => $sikumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sitikId = DB::table('jabatans')->insertGetId([
            'nama' => 'SI TIK',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSITEKOM',
                'parent_id' => $sitikId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSITEKINFO',
                'parent_id' => $sitikId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $siumId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIUM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSIMINTU',
                'parent_id' => $siumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIYANMA',
                'parent_id' => $siumId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Unsur Pelaksana Tugas Pokok
        $spktId = DB::table('jabatans')->insertGetId([
            'nama' => 'SPKT',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satintelkamId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATINTELKAM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satreskimId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATRESKIM',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satresnarkobaId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATRESNARKOBA',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satbinmasId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATBINMAS',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satsamaptaId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATSAMAPTA',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satlantasId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATLANTAS',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satpamobvitId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATPAMOBVIT',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $satpolairudId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATPOLAIRUD',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $sattahtiId = DB::table('jabatans')->insertGetId([
            'nama' => 'SATTAHTI',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Unsur Pendukung
        $sikeuId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIKEU',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSIGAJI',
                'parent_id' => $sikeuId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIVERIF',
                'parent_id' => $sikeuId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSI APK',
                'parent_id' => $sikeuId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sidokkesId = DB::table('jabatans')->insertGetId([
            'nama' => 'SIDOKKES',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('jabatans')->insert([
            [
                'nama' => 'SUBSIDOKPOL',
                'parent_id' => $sidokkesId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SUBSIKESPOL',
                'parent_id' => $sidokkesId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
