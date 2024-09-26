<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengembanganPelatihan;
use Illuminate\Support\Facades\Storage;

class PengembanganPelatihanController extends Controller
{
    public function index() {
        $penlat = PengembanganPelatihan::with('personel')->get();

        return view('superadmin.pengembanganPelatihan.view_penlat', [
            'penlat' => $penlat,
            'title' => 'Pengembangan Pelatihan',
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.pengembanganPelatihan.create_penlat', [
            'personels' => $personels,
            'title' => 'Pengembangan Pelatihan',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'dikbang' => 'required|string|max:255',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        // upload image
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pengembanganPelatihan', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $penlat = PengembanganPelatihan::create($validateData);

            return redirect()->route('view.pengembangan-pelatihan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan'. $th->getMessage());
        }
    }

    public function edit($id) {
        $penlat = PengembanganPelatihan::with('personel')->find($id);
        $personels = Personel::all();
        return view('superadmin.pengembanganPelatihan.edit_penlat', [
            'penlat' => $penlat,
            'personels' => $personels,
            'title' => 'Pengembangan Pelatihan',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'dikbang' => 'required|string|max:255',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);
        
        $penlat = PengembanganPelatihan::findOrfail($id);

         // upload image
         if($request->hasFile('gambar')) {
            Storage::delete('public/pengembanganPelatihan/' . $penlat->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pengembanganPelatihan/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $penlat->update($validateData);

            return redirect()->route('view.pengembangan-pelatihan')->with('success', 'Data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('Data gagal di update' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $penlat = PengembanganPelatihan::findOrfail($id);

             // hapus foto
             if (file_exists(public_path('storage/pengembanganPelatihan/' . $penlat->gambar))) {
                unlink(public_path('storage/pengembanganPelatihan/' . $penlat->gambar));
            }

            $penlat->delete();
            return redirect()->route('view.pengembangan-pelatihan')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
                return back()->with('Data gagal di hapus' . $th->getMessage());
        }
    }
}
