<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\RiwayatPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Personel;
use App\Models\Pangkat;

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
        $personel = Auth::user()->personel;
        $riwayatPangkat = Pangkat::all(); // Mengambil semua data pangkat dari database
        return view('personil.riwayatPangkat.create', [
            'title' => 'Tambah Riwayat Pangkat',
            'personel' => $personel,
            'riwayatPangkat' => $riwayatPangkat, // Mengirimkan data pangkat ke view
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'pangkat' => 'required|string',
            'tmt' => 'required|date',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ripang = new RiwayatPangkat();
        $ripang->personel_id = Auth::user()->personel->id;
        $ripang->pangkat = $request->pangkat;
        $ripang->tmt = $request->tmt;

        // Handle multiple images
        if($request->hasFile('gambar')) {
            $imageNames = [];
            foreach ($request->file('gambar') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/riwayatPangkat', $imageName);
                $imageNames[] = $imageName;
            }
            $ripang->gambar = json_encode($imageNames); // Store image names as JSON
        }

        $ripang->save();

        return redirect()->route('personil.ripang.index')->with('success', 'Data berhasil ditambahkan');
    }

    // public function edit($id) {
    //     $riwayatPangkat = RiwayatPangkat::findOrFail($id);
    //     $personel = Auth::user()->personel;
    //     $pangkatList = Pangkat::all(); // Mengambil semua data pangkat dari database
    
    //     return view('personil.riwayatPangkat.edit', [
    //         'title' => 'Edit Riwayat Pangkat',
    //         'personel' => $personel,
    //         'riwayatPangkat' => $riwayatPangkat,
    //         'pangkatList' => $pangkatList, // Mengirimkan data pangkat ke view
    //     ]);
    // }

    public function edit($id)
    {
        // Find the record by its ID
        $riwayat = RiwayatPangkat::findOrFail($id);

        $personel = Auth::user()->personel;
        
        // Fetch the list of available ranks (pangkat) to populate the dropdown
        $riwayatPangkat = Pangkat::all(); // Assuming `Pangkat` is the model for the ranks

        return view('personil.riwayatPangkat.edit', [
            'title' => 'Edit Riwayat Pangkat',
            'personel' => $personel,
            'riwayat' => $riwayat,
            'riwayatPangkat' => $riwayatPangkat, // Mengirimkan data pangkat ke view
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pangkat' => 'required',
            'tmt' => 'required|date',
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $riwayat = RiwayatPangkat::findOrFail($id);
        $riwayat->pangkat = $request->input('pangkat');
        $riwayat->tmt = $request->input('tmt');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($riwayat->gambar) {
                $existingImages = json_decode($riwayat->gambar, true);
                if (is_array($existingImages)) {
                    foreach ($existingImages as $existingImage) {
                        Storage::delete('public/riwayatPangkat/' . $existingImage);
                    }
                }
            }
        
            // Simpan gambar baru
            $images = $request->file('gambar');
            $imageNames = [];
            
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/riwayatPangkat', $imageName);
                $imageNames[] = $imageName;
            }
            
            // Simpan gambar baru sebagai array dalam bentuk JSON
            $riwayat->gambar = json_encode($imageNames);
        }

        $riwayat->save();

        return redirect()->route('personil.ripang.index')->with('success', 'Riwayat pangkat berhasil diperbarui');
    }


    public function destroy($id) {
        $riwayatPangkat = RiwayatPangkat::findOrFail($id);

        // Delete images if they exist
        if ($riwayatPangkat->gambar) {
            foreach (json_decode($riwayatPangkat->gambar) as $image) {
                if (Storage::exists('public/riwayatPangkat/' . $image)) {
                    Storage::delete('public/riwayatPangkat/' . $image);
                }
            }
        }

        $riwayatPangkat->delete();

        return redirect()->route('personil.ripang.index')->with('success', 'Data berhasil dihapus');
    }
}
