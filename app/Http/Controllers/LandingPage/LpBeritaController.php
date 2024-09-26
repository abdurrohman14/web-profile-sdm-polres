<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class LpBeritaController extends Controller
{
    public function index() {
        $berita = Berita::where('status', 1 )->get();
        return view('LandingPage.berita.lpBerita', [
            'berita' => $berita,
            'title' => 'Berita',
        ]);
    }

    public function search(Request $request)
{
    // Ambil query dari input
    $query = $request->input('query');

    // Lakukan pencarian berdasarkan judul atau deskripsi
    $berita = Berita::where('judul', 'LIKE', "%{$query}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                    ->where('status', 1)
                    ->latest()
                    ->get();
    
    // Kembalikan hasil pencarian ke view lpBerita.blade.php
    return view('LandingPage.berita.lpBerita', [
        'berita' => $berita,
        'query' => $query,
        'title' => 'Berita',
    ]);
}

    public function show($slug) {
        $berita = Berita::where('slug', $slug)->where('status', 1)->firstOrFail();
        $beritaTerkait = Berita::where('id', '!=', $berita->id)
                            ->where('status', 1)
                            ->latest()
                            ->limit(5) // Ambil 5 berita terbaru sebagai berita terkait
                            ->get();
        return view('LandingPage.berita.lpDetailBerita', [
            'berita' => $berita,
            'beritaTerkait' => $beritaTerkait,
            'title' => $berita->judul,
        ]);
    }
}
