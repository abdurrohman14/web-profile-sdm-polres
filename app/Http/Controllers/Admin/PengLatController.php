<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengembanganPelatihan;

class PengLatController extends Controller
{
    public function index() {
        $penglat = PengembanganPelatihan::with('personel')->get();

        return view('admin.pengembanganPelatihan.view_penglat', [
            'penglat' => $penglat,
            'title' => 'Pengembangan Pelatihan',
        ]);
    }
}
