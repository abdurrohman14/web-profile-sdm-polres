<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LpBeritaController extends Controller
{
    public function index()
    {
        $title = "Halaman Berita"; // Ini judul yang akan tampil di halaman berita
        return view('berita', compact('title'));
    }
}