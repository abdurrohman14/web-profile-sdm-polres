<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RijabController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $riwayatJabatan = RiwayatJabatan::where('personel_id', $personel->id)->get();
        return view('personil.riwayatJabatan.index', [
            'title' => 'Data Riwayat Jabatan',
            'riwayatJabatan' => $riwayatJabatan,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.riwayatJabatan.create', [
            'title' => 'Tambah Riwayat Jabatan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'jabatan' => 'required|string',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatJabatan', $imageName);
            $validateData['gambar'] = $imageName;
        }

        $rijab = new RiwayatJabatan();
        $rijab->personel_id = Auth::user()->personel->id;
        $rijab->jabatan = $request->jabatan;
        $rijab->tmt = $request->tmt;
        $rijab->gambar = $imageName;

        $rijab->save();

        return redirect()->route('personil.rijab.index')->with('success', 'Data berhasil ditambahkan');
    }
}
