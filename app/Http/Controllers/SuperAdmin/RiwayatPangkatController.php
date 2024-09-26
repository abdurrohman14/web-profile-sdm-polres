<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\RiwayatPangkat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RiwayatPangkatController extends Controller
{
    public function index() {
        $ripat = RiwayatPangkat::with('personel')->get();

        return view('superadmin.riwayatPangkat.view_riwayatPangkat', [
            'ripat' => $ripat,
            'title' => 'Riwayat Pangkat',
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.riwayatPangkat.create_riwayatPangkat', [
            'personels' => $personels,
            'title' => 'Riwayat Pangkat',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'pangkat' => 'required|string|max:255',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        // upload image
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatPangkat', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $ripat = RiwayatPangkat::create($validateData);

            return redirect()->route('view.riwayat-pangkat')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan'. $th->getMessage());
        }
    }

    public function edit($id) {
        $ripat = RiwayatPangkat::with('personel')->find($id);
        $personels = Personel::all();
        return view('superadmin.riwayatPangkat.edit_riwayatPangkat', [
            'ripat' => $ripat,
            'personels' => $personels,
            'title' => 'Riwayat Pangkat',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'pangkat' => 'required|string|max:255',
            'tmt' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);
        
        $ripat = RiwayatPangkat::findOrfail($id);

         // upload image
         if($request->hasFile('gambar')) {
            Storage::delete('public/riwayatPangkat/'.$ripat->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/riwayatPangkat/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {

            $ripat->update($validateData);

            return redirect()->route('view.riwayat-pangkat')->with('success', 'Data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('Data gagal di update' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $ripat = RiwayatPangkat::findOrfail($id);

             // hapus foto
             if (file_exists(public_path('storage/riwayatPangkat/' . $ripat->gambar))) {
                unlink(public_path('storage/riwayatPangkat/' . $ripat->gambar));
            }

            $ripat->delete();
            return redirect()->route('view.riwayat-pangkat')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
                return back()->with('Data gagal di hapus' . $th->getMessage());
        }
    }
}
