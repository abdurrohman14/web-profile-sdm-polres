<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RiwayatPangkat;
use App\Http\Controllers\Controller;

class YatPangController extends Controller
{
    public function index() {
        $yatpang = RiwayatPangkat::with('personel')->get();

        return view('admin.riwayatPangkat.view_yatpang', [
            'yatpang' => $yatpang,
            'title' => 'Riwayat Pangkat',
        ]);
    }

}
