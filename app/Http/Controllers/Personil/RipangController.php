<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class RipangController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $riwayatPangkat = RiwayatPangkat::where('personel_id', $personel->id)->get();
        return view('personil.riwayatPangkat.index', [
            'title' => 'Data Riwayat Pangkat',
            'riwayatPangkat' => $riwayatPangkat,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.riwayatPangkat.create', [
            'title' => 'Tambah Riwayat Pangkat',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'pangkat' => 'required|string',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatPangkat', $imageName);
            $validateData['gambar'] = $imageName;
        }

        $ripang = new RiwayatPangkat();
        $ripang->personel_id = Auth::user()->personel->id;
        $ripang->pangkat = $request->pangkat;
        $ripang->tmt = $request->tmt;
        $ripang->gambar = $imageName;

        $ripang->save();

        return redirect()->route('personil.ripang.index')->with('success', 'Data berhasil ditambahkan');
    }
}
