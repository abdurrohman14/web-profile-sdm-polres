<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\PenugasanLuarStruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class PlsController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $pls = PenugasanLuarStruktur::where('personel_id', $personel->id)->get();
        return view('personil.pls.index', [
            'title' => 'Data Penugasan Luar Struktur',
            'pls' => $pls,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.pls.create', [
            'title' => 'Tambah Penugasan Luar Struktur',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'penugasan' => 'required|string',
            'lokasi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Inisialisasi variabel gambar
        $imageName = null;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/penugasanLuarStruktur', $imageName); // Perbaiki nama folder penyimpanan
        }
    
        // Simpan data ke database
        $pls = new PenugasanLuarStruktur();
        $pls->personel_id = Auth::user()->personel->id;
        $pls->penugasan = $request->penugasan;
        $pls->lokasi = $request->lokasi;
        $pls->gambar = $imageName; // Pastikan ini tidak menyebabkan error jika gambar kosong
    
        $pls->save();
    
        return redirect()->route('personil.pls.index')->with('success', 'Penugasan berhasil ditambahkan');
    }
}
