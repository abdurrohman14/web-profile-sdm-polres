<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\TandaKehormatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class TankehController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $tankeh = TandaKehormatan::where('personel_id', $personel->id)->get();
        return view('personil.tankeh.index', [
            'title' => 'Data Tanda Kehormatan',
            'tankeh' => $tankeh,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.tankeh.create', [
            'title' => 'Tambah Tanda Kehormatan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tanda_kehormatan' => 'required|string',
            'tmt' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Inisialisasi variabel gambar
        $imageName = null;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/tandaKehormatan', $imageName); // Perbaiki nama folder penyimpanan
        }

        // Simpan data ke database
        $tankeh = new TandaKehormatan();
        $tankeh->personel_id = Auth::user()->personel->id;
        $tankeh->tanda_kehormatan = $request->tanda_kehormatan;
        $tankeh->tmt = $request->tmt;
        $tankeh->gambar = $imageName; // Pastikan ini tidak menyebabkan error jika gambar kosong

        $tankeh->save();

        return redirect()->route('personil.tankeh.index')->with('success', 'Tanda Kehormatan berhasil ditambahkan');
    }
}
