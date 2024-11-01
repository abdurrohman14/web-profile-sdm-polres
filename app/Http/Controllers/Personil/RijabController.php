<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini


class RijabController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $riwayatJabatan = RiwayatJabatan::where('personel_id', $personel->id)->orderBy('tanggal_kenaikan', 'desc')->get();
        
        return view('personil.riwayatJabatan.index', [
            'title' => 'Data Riwayat Jabatan',
            'riwayatJabatan' => $riwayatJabatan,
            'personel' => $personel,
        ]);
    }
}
