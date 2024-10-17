<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenugasanLuarStruktur;

class PenLusController extends Controller
{
    public function index() {
        $penlus = PenugasanLuarStruktur::with('personel')->get();
        return view('admin.penugasanLuarStruktur.view_penlus', [
            'penlus' => $penlus,
            'title' => 'Penugasan Luar Struktur'
        ]);
    }
}
