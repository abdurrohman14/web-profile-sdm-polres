<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personels')->insert([
            'jabatan_id' => 1,
            'pangkat_id' => 1,
            'pangkat_pns_polri_id' => 1,
            'user_id' => 1,
            'foto' => 'path/to/photo.jpg',
            'nama_lengkap' => 'John Doe',
            'nama_panggilan' => 'John',
            'nrp' => '123456789',
            'tempat_lahir' => 'Jakarta',
            'email_pribadi' => 'john.doe@example.com',
            'email_dinas' => 'john.doe@polri.go.id',
            'no_hp' => '081234567890',
            'status' => 'Active',
            'tmt_status' => '2023-01-01',
            'golongan_darah' => 'O',
            'jenis_kelamin' => 'Male',
            'status_pernikahan' => 'Married',
            'anak_ke' => 1,
            'agama' => 'Islam',
            'alamat_personel' => 'Jl. Merdeka No. 123, Jakarta',
            'lkhpn' => true,
            'tanggal_lahir' => '1990-01-01',
            'jenis_rambut' => 'Straight',
            'warna_mata' => 'Brown',
            'warna_kulit' => 'Fair',
            'warna_rambut' => 'Black',
            'nama_ibu' => 'Jane Doe',
            'telepon_ortu' => '081234567891',
            'alamat_ortu' => 'Jl. Kemerdekaan No. 321, Jakarta',
            'tinggi' => 170,
            'ukuran_topi' => 58,
            'ukuran_celana' => 32,
            'sidik_jari_1' => '12345',
            'nomor_keputusan_penyidik' => '67890',
            'bpjs' => '987654321',
            'npwp' => '1234567890',
            'nomor_kk' => '2345678901',
            'berat' => 70,
            'ukuran_sepatu' => 42,
            'ukuran_baju' => 'L',
            'sidik_jari_2' => '54321',
            'kta' => '1122334455',
            'asabri' => '5566778899',
            'nik' => '331234567890',
            'paspor' => 'A1234567',
            'tmt_masa_dinas' => '2015-01-01',
            'akte_lahir' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
