<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LpEventController extends Controller
{
    public function index() {
        $event = Event::all();
        return view('LandingPage.event.lpEvent', [
            'event' => $event,
            'title' => 'Event',
        ]);
    }
}
