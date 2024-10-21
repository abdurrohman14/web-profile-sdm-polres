<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PangkatController extends Controller
{
    public function cekKenaikanPangkat(Personel $personel) {
        // Ambil pendidikan tertinggi dari relasi
        $pendidikanTertinggi = $personel->pendidikanUmum->sortByDesc('tahun')->first();
        
        // Tetapkan threshold untuk kenaikan pangkat berdasarkan pendidikan
        if ($pendidikanTertinggi && $pendidikanTertinggi->tingkat == 'sarjana') {
            $threshold = 3; // Kenaikan pangkat lebih cepat untuk sarjana
        } else {
            $threshold = 4; // Threshold standar
        }

        $lamaJabatan = $personel->getLamaJabatan(); // Fungsi untuk menghitung lama jabatan

        if ($lamaJabatan >= $threshold) {
            $personel->pangkat = $this->naikkanPangkat($personel->pangkat);
            $personel->save();

            return "Personel telah naik pangkat ke " . $personel->pangkat;
        }

        return "Personel belum memenuhi syarat untuk kenaikan pangkat.";
    }

    protected function naikkanPangkat($currentPangkat) {
        // Logika untuk menentukan pangkat baru
        $pangkatBaru = ''; // Hitung atau tentukan pangkat baru di sini
        // ...
        return $pangkatBaru;
    }
}
