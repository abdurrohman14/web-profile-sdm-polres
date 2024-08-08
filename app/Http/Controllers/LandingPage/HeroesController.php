<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Hero;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroesController extends Controller
{
    public function index() {
        $hero = Hero::first();
        $partners = Partner::all();
        return view('welcome', compact('hero','partners'));
    }
}
