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
        $heroSlide = Hero::all();
        $partners = Partner::all();
        $ourteams = Ourteam::all();
        $berita = Berita::latest()->take(3)->get();
        $event = Event::latest()->take(6)->get();
        return view('partials.landingPage.main', [
            'heroSlide' => $heroSlide,
            'partners' => $partners,
            'ourteams' => $ourteams,
            'berita' => $berita,
            'event' => $event,
            'title' => 'SDM Polresta Banyuwangi'
        ]);
    }
}
