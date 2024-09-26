<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\PendidikanUmum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PendidikanUmumController extends Controller
{
    public function index() {
        $pendikum = PendidikanUmum::with('personel')->get();
        return view('superadmin.pendidikanUmum.view_pendikum', [
            'pendikum' => $pendikum,
            'title' => 'Pendidikan Umum',
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.pendidikanUmum.create_pendikum',[
            'title' => 'Pendidikan Umum',
            'personels' => $personels,
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id', // Pastikan personel ada
            'tingkat' => 'required|string|max:255',
            'nama_institusi' => 'required|string|max:255',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanUmum', $imageName);
            $validateData['gambar'] = $imageName;
        }

       try {
            $pendikum = PendidikanUmum::create($validateData);

            return redirect()->route('view.pendidikan-umum')->with('success', 'Data berhasil ditambahkan');
       } catch (\Throwable $th) {
            return back()->with('Gagal menambahkan data' . $th->getMessage());
       }
    }

    public function show($id) {
        $pendikum = PendidikanUmum::findOrfail($id);
        return view('superadmin.pendidikanUmum.detail_pendikum',[
            'title' => 'Pendidikan Umum',
            'pendikum' => $pendikum,
        ]);
    }

    public function edit($id) {
        $pendikum = PendidikanUmum::findOrfail($id);
        $personels = Personel::all();
        return view('superadmin.pendidikanUmum.edit_pendikum',[
            'title' => 'Pendidikan Umum',
            'pendikum' => $pendikum,
            'personels' => $personels,
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id', // Pastikan personel
            'tingkat' => 'required|string|max:255',
            'nama_institusi' => 'required|string',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        $pendikum = PendidikanUmum::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/pendidikanUmum/' . $pendikum->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanUmum/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {

            $pendikum->update($validateData);

            return redirect()->route('view.pendidikan-umum')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            return back()->with('Gagal mengupdate data' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $pendikum = PendidikanUmum::findOrFail($id);

            // hapus foto
            if (file_exists(public_path('storage/pendidikanUmum/' . $pendikum->gambar))) {
                unlink(public_path('storage/pendidikanUmum/' . $pendikum->gambar));
            }

            $pendikum->delete();

            return redirect()->route('view.pendidikan-umum')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('Gagal menghapus data' . $th->getMessage());
        }
    }
}
