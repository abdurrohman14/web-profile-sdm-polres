<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Hero;
use App\Models\Berita;
use App\Models\Ourteam;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroesController extends Controller
{
    public function index() {
        $hero = Hero::first();
        $partners = Partner::all();
        $ourteams = Ourteam::all();
        $berita = Berita::all();
        return view('welcome', [
            'hero' => $hero,
            'partners' => $partners,
            'ourteams' => $ourteams,
            'berita' => $berita,
            'title' => 'SDM Polres'
        ]);
    }
}
