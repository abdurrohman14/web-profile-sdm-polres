<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\PendidikanUmum;
use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenumController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $pendidikanUmum = PendidikanUmum::where('personel_id', $personel->id)->get();
        return view('personil.pendidikanUmum.index', [
            'title' => 'Data Pendidikan Umum',
            'pendidikanUmum' => $pendidikanUmum,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::user()->personel->id);
        $tingkatPendidikanUmum = JenjangPendidikan::all();
        return view('personil.pendidikanUmum.create', [
            'title' => 'Tambah Pendidikan',
            'tingkatPendidikanUmum' => $tingkatPendidikanUmum,
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'jenjang_id' => 'required|exists:jenjang_pendidikans,id',
            'nama_institusi' => 'required|string',
            'tahun' => 'required|integer',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pendidikan = new PendidikanUmum();
        $pendidikan->personel_id = Auth::user()->personel->id;
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->tahun = $request->tahun;

        if($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageNames = [];
            
            foreach($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/pendidikanUmum', $imageName);
                $imageNames[] = $imageName;
            }

            $pendidikan->gambar = json_encode($imageNames);
        }

        $pendidikan->save();

        return redirect()->route('personil.penum.index')->with('success', 'Pendidikan berhasil ditambahkan');
    }

    public function edit($id) {
        $pendidikan = PendidikanUmum::findOrFail($id);
        $personel = Personel::find(Auth::user()->personel->id);
        $tingkatPendidikanUmum = JenjangPendidikan::all();

        return view('personil.pendidikanUmum.edit', [
            'title' => 'Edit Pendidikan',
            'pendidikan' => $pendidikan,
            'personel' => $personel,
            'tingkatPendidikanUmum' => $tingkatPendidikanUmum,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'jenjang_id' => 'required|exists:jenjang_pendidikans,id',
            'nama_institusi' => 'required|string',
            'tahun' => 'required|numeric',
            'gambar.*' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $pendidikan = PendidikanUmum::findOrFail($id);
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->tahun = $request->tahun;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($pendidikan->gambar) {
                $existingImages = json_decode($pendidikan->gambar, true);
                if (is_array($existingImages)) {
                    foreach ($existingImages as $existingImage) {
                        Storage::delete('public/pendidikanUmum/' . $existingImage);
                    }
                }
            }
        
            // Simpan gambar baru
            $images = $request->file('gambar');
            $imageNames = [];
            
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/pendidikanUmum', $imageName);
                $imageNames[] = $imageName;
            }
            
            // Simpan gambar baru sebagai array dalam bentuk JSON
            $pendidikan->gambar = json_encode($imageNames);
        }
        
        $pendidikan->save();

        return redirect()->route('personil.penum.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $pendidikan = PendidikanUmum::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($pendidikan->gambar) {
            $images = json_decode($pendidikan->gambar);
            foreach ($images as $image) {
                if (Storage::exists('public/pendidikanUmum/' . $image)) {
                    Storage::delete('public/pendidikanUmum/' . $image);
                }
            }
        }

        $pendidikan->delete();

        return redirect()->route('personil.penum.index')->with('success', 'Data pendidikan berhasil dihapus');
    }
}
