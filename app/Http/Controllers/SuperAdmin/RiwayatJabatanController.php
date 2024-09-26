<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\RiwayatJabatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RiwayatJabatanController extends Controller
{
    public function index() {
        $rijab = RiwayatJabatan::with('personel')->get();

        return view('superadmin.riwayatJabatan.view_riwayatJabatan', [
            'rijab' => $rijab,
            'title' => 'Riwayat Jabatan',
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.riwayatJabatan.create_riwayatJabatan', [
            'personels' => $personels,
            'title' => 'Riwayat Jabatan',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'jabatan' => 'required|string|max:255',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        // upload image
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatJabatan', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $rijab = RiwayatJabatan::create($validateData);

            return redirect()->route('view.riwayat-jabatan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan'. $th->getMessage());
        }
    }

    public function edit($id) {
        $rijab = RiwayatJabatan::with('personel')->find($id);
        $personels = Personel::all();
        return view('superadmin.riwayatJabatan.edit_riwayatJabatan', [
            'rijab' => $rijab,
            'personels' => $personels,
            'title' => 'Riwayat Jabatan',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'jabatan' => 'required|string|max:255',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);
        
        $rijab = RiwayatJabatan::findOrfail($id);

         // upload image
         if($request->hasFile('gambar')) {
            Storage::delete('public/riwayatJabatan/'.$rijab->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatJabatan/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {

            $rijab->update($validateData);

            return redirect()->route('view.riwayat-jabatan')->with('success', 'Data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('Data gagal di update' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $rijab = RiwayatJabatan::findOrfail($id);

             // hapus foto
             if (file_exists(public_path('storage/riwayatJabatan/' . $rijab->gambar))) {
                unlink(public_path('storage/riwayatJabatan/' . $rijab->gambar));
            }

            $rijab->delete();
            return redirect()->route('view.riwayat-jabatan')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
                return back()->with('Data gagal di hapus' . $th->getMessage());
        }
    }
}
