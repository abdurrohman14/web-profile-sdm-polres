<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Personel;
use App\Models\Pangkat;

class RipangController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $riwayatPangkat = RiwayatPangkat::where('personel_id', $personel->id)->orderBy('tanggal_kenaikan', 'desc')->get();
        return view('personil.riwayatPangkat.index', [
            'title' => 'Data Riwayat Pangkat',
            'riwayatPangkat' => $riwayatPangkat,
            'personel' => $personel,
        ]);
    }
}
