<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\subPangkatPolri;

class PangkatPolriController extends Controller
{
    public function index() {
        $pangkatPolri = Pangkat::all();
        return view('superadmin.pangkat.view_pangkat_polri', [
            'pangkatPolri' => $pangkatPolri,
            'title' => 'Pangkat Polri',
        ]);
    }

    public function create() {
        return view('superadmin.pangkat.create_pangkat_polri', [
            'title' => 'Tambah Pangkat Polri',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $pangkatPolri = new Pangkat();
        $pangkatPolri->nama = $validateData['nama'];
        $pangkatPolri->save();

        return redirect()->route('view.pangkat')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $pangkatPolri = Pangkat::find($id);
        return view('superadmin.pangkat.edit_pangkat_polri', [
            'pangkatPolri' => $pangkatPolri,
            'title' => 'Edit Pangkat Polri',
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $pangkatPolri = Pangkat::find($id);
        $pangkatPolri->nama = $validatedData['nama'];

        return redirect()->route('view.pangkat')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $pangkatPolri = Pangkat::find($id);
        $pangkatPolri->delete();

        return redirect()->route('view.pangkat')->with('success', 'Data berhasil dihapus');
    }

    // Sub Pangkat Polri Controller
    public function viewSubPangkat() {
        $subPangkat = subPangkatPolri::with('pangkatPolri')->get();
        return view('superadmin.subPangkat.view_subPangkat', [
            'subPangkat' => $subPangkat,
            'title' => 'View Sub Pangkat',
        ]);
    }

    public function createSubPangkat() {
        $pangkatPolri = Pangkat::all();
        return view('superadmin.subPangkat.create_subPangkat', [
            'pangkatPolri' => $pangkatPolri,
            'title' => 'Tambah Sub Pangkat',
        ]);
    }

    public function storeSubPangkat(Request $request) {
        $validateData = $request->validate([
            'pangkat_id' => 'required | exists:pangkats,id',
            'nama' => 'required | max:100',
        ]);

        $subPangkat = new subPangkatPolri();
        $subPangkat->pangkat_id = $validateData['pangkat_id'];
        $subPangkat->nama = $validateData['nama'];
        $subPangkat->save();

        return redirect()->route('view.subPangkat')->with('success', 'Data berhasil ditambahkan.');
    }

    public function editSubPangkat($id) {
        $subPangkat = subPangkatPolri::find($id);
        $pangkatPolri = Pangkat::all();
        return view('superadmin.subPangkat.edit_subPangkat', [
            'subPangkat' => $subPangkat,
            'pangkatPolri' => $pangkatPolri,
            'title' => 'Edit Sub Pangkat',
        ]);
    }

    public function updateSubPangkat(Request $request, $id) {
        $validateData = $request->validate([
            'pangkat_id' => 'required | exists:pangkats,id',
            'nama' => 'required | max:100',
        ]);

        $subPangkat = subPangkatPolri::find($id);
        $subPangkat->pangkat_id = $validateData['pangkat_id'];
        $subPangkat->nama = $validateData['nama'];
        $subPangkat->save();

        return redirect()->route('view.subPangkat')->with('success', 'Data berhasil diupdate.');
    }

    public function deleteSubPangkat($id) {
        $subPangkat = subPangkatPolri::find($id);
        $subPangkat->delete();

        return redirect()->route('view.subPangkat')->with('success', 'Data berhasil dihapus.');
    }
}
