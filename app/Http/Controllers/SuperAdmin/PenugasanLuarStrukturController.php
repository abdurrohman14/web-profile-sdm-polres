<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PenugasanLuarStruktur;
use Illuminate\Support\Facades\Storage;

class PenugasanLuarStrukturController extends Controller
{
    public function index() {
        $penlu = PenugasanLuarStruktur::with('personel')->get();
        return view('superadmin.penugasanLuarStruktur.view_penlu', [
            'penlu' => $penlu,
            'title' => 'Penugasan Luar Struktur'
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.penugasanLuarStruktur.create_penlu', [
            'personels' => $personels,
            'title' => 'Penugasan Luar Struktur'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'penugasan' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // upload gambar
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/penlu', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $penlu = PenugasanLuarStruktur::create($validateData);

            return redirect()->route('view.penlu')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan' . $th->getMessage());
        }
    }

    public function edit($id) {
        $penlu = PenugasanLuarStruktur::find($id);
        $personels = Personel::all();
        return view('superadmin.penugasanLuarStruktur.edit_penlu', [
            'penlu' => $penlu,
            'personels' => $personels,
            'title' => 'Penugasan Luar Struktur'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'penugasan' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
        
        $penlu = PenugasanLuarStruktur::find($id);

        // upload gambar
        if($request->hasFile('gambar')) {
            Storage::delete('public/penlu/'.$penlu->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/penlu/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $penlu->update($validateData);

            return redirect()->route('view.penlu')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('Data gagal diubah' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $penlu = PenugasanLuarStruktur::findOrFail($id);
            // hapus foto
            if (file_exists(public_path('storage/penlu/' . $penlu->gambar))) {
                unlink(public_path('storage/penlu/' . $penlu->gambar));
            }

            $penlu->delete();
        } catch(\Throwable $th) {
            return back()->with('Data gagal dihapus' . $th->getMessage());
        }
    }
}
