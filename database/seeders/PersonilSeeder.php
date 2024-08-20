<?php

namespace Database\Seeders;

use App\Models\Personel;
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
        $data = [
            [
                'jabatan_id' => 1,
                'pangkat_id' => 1,
                'pangkat_pns_polri_id' => 1,
                'user_id' => 1,
                'foto' => 'path/to/default/photo1.jpg',
                'nama_lengkap' => 'John Doe',
                'nama_panggilan' => 'John',
                'nrp' => '1234567890',
                'tempat_lahir' => 'City A',
                'email_pribadi' => 'john.doe@example.com',
                'email_dinas' => 'john.doe@police.example.com',
                'no_hp' => '08123456789',
                'status' => 'Aktif',
                'tmt_status' => '2024-01-01',
                'golongan_darah' => 'A',
                'jenis_kelamin' => 'Laki-laki',
                'status_pernikahan' => 'Menikah',
                'anak_ke' => 1,
                'agama' => 'Islam',
                'alamat_personel' => 'Alamat Personel A',
                'lkhpn' => false,
                'tanggal_lahir' => '1990-01-01',
                'jenis_rambut' => 'Pendek',
                'warna_mata' => 'Cokelat',
                'warna_kulit' => 'Sawo Matang',
                'warna_rambut' => 'Hitam',
                'nama_ibu' => 'Jane Doe',
                'telepon_ortu' => '08123456780',
                'alamat_ortu' => 'Alamat Ortu A',
                'tinggi' => 170,
                'ukuran_topi' => 58,
                'ukuran_celana' => 32,
                'sidik_jari_1' => 'sidik-jari-1',
                'nomor_keputusan_penyidik' => 'NKP123456',
                'bpjs' => 'BPJS123456',
                'npwp' => 'NPWP123456',
                'nomor_kk' => 'KK123456',
                'berat' => 70,
                'ukuran_sepatu' => 42,
                'ukuran_baju' => 'L',
                'sidik_jari_2' => 'sidik-jari-2',
                'kta' => 'KTA123456',
                'asabri' => 'ASABRI123456',
                'nik' => 'NIK123456',
                'paspor' => 'PASPOR123456',
                'tmt_masa_dinas' => '2015-01-01',
                'akte_lahir' => 'AKTE123456',
            ],
            [
                'jabatan_id' => 2,
                'pangkat_id' => 2,
                'pangkat_pns_polri_id' => 1,
                'user_id' => 2,
                'foto' => 'path/to/default/photo2.jpg',
                'nama_lengkap' => 'Jane Smith',
                'nama_panggilan' => 'Jane',
                'nrp' => '0987654321',
                'tempat_lahir' => 'City B',
                'email_pribadi' => 'jane.smith@example.com',
                'email_dinas' => 'jane.smith@police.example.com',
                'no_hp' => '08198765432',
                'status' => 'Aktif',
                'tmt_status' => '2024-02-01',
                'golongan_darah' => 'B',
                'jenis_kelamin' => 'Perempuan',
                'status_pernikahan' => 'Belum Menikah',
                'anak_ke' => 2,
                'agama' => 'Kristen',
                'alamat_personel' => 'Alamat Personel B',
                'lkhpn' => false,
                'tanggal_lahir' => '1992-02-02',
                'jenis_rambut' => 'Panjang',
                'warna_mata' => 'Biru',
                'warna_kulit' => 'Putih',
                'warna_rambut' => 'Blonde',
                'nama_ibu' => 'Ann Smith',
                'telepon_ortu' => '08198765431',
                'alamat_ortu' => 'Alamat Ortu B',
                'tinggi' => 160,
                'ukuran_topi' => 56,
                'ukuran_celana' => 30,
                'sidik_jari_1' => 'sidik-jari-3',
                'nomor_keputusan_penyidik' => 'NKP654321',
                'bpjs' => 'BPJS654321',
                'npwp' => 'NPWP654321',
                'nomor_kk' => 'KK654321',
                'berat' => 50,
                'ukuran_sepatu' => 38,
                'ukuran_baju' => 'M',
                'sidik_jari_2' => 'sidik-jari-4',
                'kta' => 'KTA654321',
                'asabri' => 'ASABRI654321',
                'nik' => 'NIK654321',
                'paspor' => 'PASPOR654321',
                'tmt_masa_dinas' => '2016-02-01',
                'akte_lahir' => 'AKTE654321',
            ],
            // Tambahkan data personel lainnya sesuai kebutuhan
        ];

        foreach ($data as $personel) {
            Personel::create($personel);
        }
    }
}
