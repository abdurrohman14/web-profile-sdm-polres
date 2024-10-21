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
        $personel = Auth::user()->personel;
        return view('personil.riwayatJabatan.create', [
            'title' => 'Tambah Riwayat Jabatan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        // Validasi data
        $request->validate([
            'jabatan' => 'required|string',
            'tmt' => 'required|date',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Buat objek RiwayatJabatan baru
        $rijab = new RiwayatJabatan();
        $rijab->personel_id = Auth::user()->personel->id;
        $rijab->jabatan = $request->jabatan;
        $rijab->tmt = $request->tmt;

        // Proses upload gambar jika ada
        if($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageNames = [];

            foreach($images as $image) {
                // Buat nama file unik dengan waktu dan nama asli file
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Simpan gambar ke folder public/riwayatJabatan
                $image->storeAs('public/riwayatJabatan', $imageName);
                
                // Simpan nama gambar dalam array
                $imageNames[] = $imageName;
            }

            // Simpan nama-nama file gambar dalam bentuk JSON
            $rijab->gambar = json_encode($imageNames);
        }

        // Simpan data riwayat jabatan ke database
        $rijab->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('personil.rijab.index')->with('success', 'Data berhasil ditambahkan');
    }
}
