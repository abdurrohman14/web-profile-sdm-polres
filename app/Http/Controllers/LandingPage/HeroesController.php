<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Hero;
use App\Models\Berita;
use App\Models\Ourteam;
use App\Models\Event;
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
        $event = Event::all();
        return view('partials.landingPage.main', [
            'hero' => $hero,
            'partners' => $partners,
            'ourteams' => $ourteams,
            'berita' => $berita,
            'event' => $event,
            'title' => 'SDM Polresta Banyuwangi'
        ]);
    }
}
