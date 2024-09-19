<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class LpBeritaController extends Controller
{
    public function index() {
        $berita = Berita::all();
        return view('LandingPage.berita.lpBerita', [
            'berita' => $berita,
            'title' => 'Berita',
        ]);
    }
}
