<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LpEventController extends Controller
{
    public function index() {
        $events = Event::paginate(3);
        return view('LandingPage.event.lpEvent', [
            'events' => $events,
            'title' => 'Event',
        ]);
    }

    public function search(Request $request) {
        // Ambil query dari input
        $query = $request->input('query');

        // Lakukan pencarian berdasarkan judul atau deskripsi
        $events = Event::where('judul', 'LIKE', "%{$query}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                        ->latest()
                        ->paginate(5);
        
        // Kembalikan hasil pencarian ke view lpEvent.blade.php
        return view('LandingPage.event.lpEvent', [
            'events' => $events,
            'query' => $query,
            'title' => 'Event',
        ]);
    }

    public function show($id) {
        $eventss = Event::findOrFail($id);
        $eventTerkait = Event::where('id', '!=', $eventss->id)
                            ->latest()
                            ->limit(5) // Ambil 5 event terbaru sebagai event terkait
                            ->get();

        return view('LandingPage.event.lpDetailEvent', [
            'eventss' => $eventss,
            'eventTerkait' => $eventTerkait,
            'title' => $eventss->judul,
        ]);
    }
}
