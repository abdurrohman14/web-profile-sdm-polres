<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini


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

    public function edit($id)
    {
        $riwayatJabatan = RiwayatJabatan::findOrFail($id);
        $personel = Auth::user()->personel;
        return view('personil.riwayatJabatan.edit', [
            'title' => 'Data Riwayat Jabatan',
            'riwayatJabatan' => $riwayatJabatan,
            'personel' => $personel,
        ]);
        
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jabatan' => 'required|string|max:255',
            'tmt' => 'required|date',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
    
        // Temukan riwayat jabatan
        $riwayatJabatan = RiwayatJabatan::findOrFail($id);
        $riwayatJabatan->jabatan = $request->jabatan;
        $riwayatJabatan->tmt = $request->tmt;
    
        // Jika ada gambar baru, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($riwayatJabatan->gambar) {
                $existingImages = json_decode($riwayatJabatan->gambar, true);
                if (is_array($existingImages)) {
                    foreach ($existingImages as $existingImage) {
                        Storage::delete('public/riwayatJabatan/' . $existingImage);
                    }
                }
            }
    
            // Simpan gambar baru
            $images = $request->file('gambar');
            $imageNames = [];
            
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/riwayatJabatan', $imageName);
                $imageNames[] = $imageName;
            }
    
            // Simpan gambar baru dalam bentuk JSON
            $riwayatJabatan->gambar = json_encode($imageNames);
        }
    
        // Simpan data riwayat jabatan yang telah diperbarui
        $riwayatJabatan->save();
    
        return redirect()->route('personil.rijab.index')->with('success', 'Riwayat jabatan berhasil diperbarui!');
    }
    
    public function destroy($id)
{
    $riwayatJabatan = RiwayatJabatan::findOrFail($id);

    // Hapus gambar dari penyimpanan jika ada
    if ($riwayatJabatan->gambar) {
        foreach (json_decode($riwayatJabatan->gambar) as $image) {
            $imagePath = 'public/riwayatJabatan/' . $image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }
    }

    $riwayatJabatan->delete();

    return redirect()->route('personil.rijab.index')->with('success', 'Data berhasil dihapus');
}



}
