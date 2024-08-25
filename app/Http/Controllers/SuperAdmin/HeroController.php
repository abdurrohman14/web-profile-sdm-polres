<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index() {
        $heros = Hero::all();
        return view('superadmin.hero.view_hero', [
            'heros' => $heros,
            'title' => 'Hero',
        ]);
    }

    public function create() {
        return view('superadmin.hero.add_hero', [
            'title' => 'Tambah Hero',
        ]);
    }

    public function store(Request $request) {
        // validasi
        $validateData = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload Gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/hero', $gambarName);
            $validateData['gambar'] = $gambarName;
        }

        $heros = new Hero();
        $heros->judul = $validateData['judul'];
        $heros->deskripsi = $validateData['deskripsi'];
        // $heros->gambar = $validateData['gambar'] ?? null;
        $heros->gambar = $gambarName;
        $heros->save();

        return redirect()->route('index.hero')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function showHero($id) {
        $heros = Hero::find($id);
        return view('superadmin.hero.view_hero_detail', [
            'heros' => $heros,
            'title' => 'Detail Hero',
        ]);
    }

    public function edit($id) {
        $heros = Hero::find($id);
        return view('superadmin.hero.edit_hero', [
            'heros' => $heros,
            'title' => 'Edit Hero',
        ]);
    }

    public function update(Request $request, $id) {
        $heros = Hero::find($id);
        $validateData = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($heros->gambar) {
                Storage::delete('public/' . $heros->gambar);
            }
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/hero', $gambarName);
            $validateData['gambar'] =$gambarName;
        }
        
        $heros->judul = $validateData['judul'];
        $heros->deskripsi = $validateData['deskripsi'];
        if(isset($validateData['gambar'])) {
            $heros->gambar = $validateData['gambar'];
        }

        $heros->save();
        return redirect()->route('index.hero')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id) {
        $heros = Hero::find($id);
        $heros->delete();

        return redirect()->route('index.hero')->with('success', 'Data Berhasil Dihapus!');
    }
}
