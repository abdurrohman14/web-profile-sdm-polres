<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendidikanKepolisian;
use Illuminate\Support\Facades\Storage;

class PendidikanKepolisianController extends Controller
{
    public function index() {
        $penkop = PendidikanKepolisian::with('personel')->get();
        return view('superadmin.pendidikanKepolisian.view_penkop',[
            'title' => 'Pendidikan Kepolisian',
            'penkop' => $penkop,
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.pendidikanKepolisian.create_penkop',[
            'title' => 'Pendidikan Kepolisian',
            'personels' => $personels,
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id', // Pastikan personel ada
            'tingkat' => 'required|string|max:255',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanKepolisian', $imageName);
            $validateData['gambar'] = $imageName;
        }

       try {
            $penkop = PendidikanKepolisian::create($validateData);

            return redirect()->route('view.pendidikan-kepolisian')->with('success', 'Data berhasil ditambahkan');
       } catch (\Throwable $th) {
            return back()->with('Gagal menambahkan data' . $th->getMessage());
       }
    }

    public function show($id) {
        $penkop = PendidikanKepolisian::findOrfail($id);
        return view('superadmin.pendidikanKepolisian.detail_penkop',[
            'title' => 'Pendidikan Kepolisian',
            'penkop' => $penkop,
        ]);
    }

    public function edit($id) {
        $penkop = PendidikanKepolisian::findOrfail($id);
        $personels = Personel::all();
        return view('superadmin.pendidikanKepolisian.edit_penkop',[
            'title' => 'Pendidikan Kepolisian',
            'penkop' => $penkop,
            'personels' => $personels,
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id', // Pastikan personel
            'tingkat' => 'required|string|max:255',
            'tahun' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $penkop = PendidikanKepolisian::findOrFail($id);
        
        if ($request->hasFile('gambar')) {
            Storage::delete('public/pendidikanKepolisian/' . $penkop->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanKepolisian/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {

            $penkop->update($validateData);

            return redirect()->route('view.pendidikan-kepolisian')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            return back()->with('Gagal mengupdate data' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $penkop = PendidikanKepolisian::findOrFail($id);

            // hapus foto
            if (file_exists(public_path('storage/pendidikanKepolisian/' . $penkop->gambar))) {
                unlink(public_path('storage/pendidikanKepolisian/' . $penkop->gambar));
            }

            $penkop->delete();

            return redirect()->route('view.pendidikan-kepolisian')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('Gagal menghapus data' . $th->getMessage());
        }
    }
}
