<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;

class YatJabController extends Controller
{
    public function index() {
        $yatjab = RiwayatJabatan::with('personel')->get();

        return view('admin.riwayatJabatan.view_yatjab', [
            'yatjab' => $yatjab,
            'title' => 'Riwayat Jabatan',
        ]);
    }

}
