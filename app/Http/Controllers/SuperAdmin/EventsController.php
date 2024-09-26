<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index() {
        $event = Event::all();
        return view('superadmin.event.view_event', [
            'event' => $event,
            'title' => 'Events'
        ]);
    }

    public function create() {
        return view('superadmin.event.create_event', [
            'title' => 'Tambah Event'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        // upload gambar
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/event', $imageName);
            $validateData['gambar'] = $imageName;
        }

        $event = new Event();
        $event->judul = $validateData['judul'];
        $event->deskripsi = $validateData['deskripsi'];
        $event->gambar = $imageName;

        $event->save();

        return redirect()->route('view.event')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $event = Event::find($id);
        return view('superadmin.event.edit_event', [
            'event' => $event,
            'title' => 'Edit Event'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:512'
        ]);

        $event = Event::find($id);

        if($request->hasFile('gambar')) {
            Storage::delete('public/event/'.$event->gambar);

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/event', $imageName);
            $validateData['gambar'] = $imageName;
        }

        $event->judul = $validateData['judul'];
        $event->deskripsi = $validateData['deskripsi'];

        if(isset($validateData['gambar'])){
            $event->gambar = $validateData['gambar'];
        }

        $event->save();

        return redirect()->route('view.event')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $event = Event::find($id);
        Storage::delete('public/event/'.$event->gambar);
        $event->delete();

        return redirect()->route('view.event')->with('success', 'Data berhasil dihapus');
    }
}

