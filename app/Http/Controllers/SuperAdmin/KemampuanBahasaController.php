<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\KemampuanBahasa;
use App\Http\Controllers\Controller;

class KemampuanBahasaController extends Controller
{
    public function index(){
        $mamba = KemampuanBahasa::with('personel')->get();
        return view('superadmin.kemampuanBahasa.view_bahasa', [
            'mamba' => $mamba,
            'title' => 'Kemampuan Bahasa'
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.kemampuanBahasa.create_bahasa', [
            'personels' => $personels,
            'title' => 'Kemampuan Bahasa'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'bahasa' => 'required|string',
            'status' => 'required|string',
        ]);

        try {
            $mamba = KemampuanBahasa::create($validateData);

            return redirect()->route('view.kemampuan-bahasa')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan' . $th->getMessage());
        }
    }

    public function edit($id) {
        $mamba = KemampuanBahasa::findOrFail($id);
        $personels = Personel::all();
        return view('superadmin.kemampuanBahasa.edit_bahasa', [
            'mamba' => $mamba,
            'personels' => $personels,
            'title' => 'Kemampuan Bahasa'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'bahasa' => 'required|string',
            'status' => 'required|string',
        ]);

        try {
            $mamba = KemampuanBahasa::findOrFail($id);
            $mamba->update($validateData);
            return redirect()->route('view.kemampuan-bahasa')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('Data gagal diubah' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $mamba = KemampuanBahasa::findOrFail($id);
            $mamba->delete();

            return redirect()->route('view.kemampuan-bahasa')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('Data gagal dihapus' . $th->getMessage());
        }
    }
}
