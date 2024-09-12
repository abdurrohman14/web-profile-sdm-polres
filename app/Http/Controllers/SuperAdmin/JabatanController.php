<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Jabatan;
use App\Models\subJabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index() {
        $jabatan = Jabatan::all();
        return view('superadmin.jabatan.view_jabatan', [
            'jabatan' => $jabatan,
            'title' => 'Jabatan',
        ]);
    }

    public function create() {
        return view('superadmin.jabatan.create_jabatan', [
            'title' => 'Tambah Jabatan',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $jabatan = new Jabatan();
        $jabatan->nama = $validateData['nama'];
        $jabatan->save();

        return redirect()->route('view.jabatan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id) {
        $jabatan = Jabatan::find($id);

        return view('superadmin.jabatan.edit_jabatan', [
            'jabatan' => $jabatan,
            'title' => 'Edit Jabatan',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $jabatan = Jabatan::find($id);
        $jabatan->nama = $validateData['nama'];
        $jabatan->save();
        
        return redirect()->route('view.jabatan')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id) {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return redirect()->route('view.jabatan')->with('success', 'Data Berhasil Di Hapus');
    }

    // Sub Jabatan Controller
    public function viewSubJabatan() {
        $subJabatan = subJabatan::with('jabatan')->get();
        return view('superadmin.subJabatan.view_subJabatan', [
            'subJabatan' => $subJabatan,
            'title' => 'View Sub Jabatan',
        ]);
    }

    public function createSubJabatan() {
        $jabatan = Jabatan::all();
        return view('superadmin.subJabatan.create_subJabatan', [
            'jabatan' => $jabatan,
            'title' => 'Tambah Sub Jabatan',
        ]);
    }

    public function storeSubJabatan(Request $request) {
        $validateData = $request->validate([
            'jabatan_id' => 'required | exists:jabatans,id',
            'nama' => 'required | max:100',
        ]);

        $subJabatan = new subJabatan();
        $subJabatan->jabatan_id = $validateData['jabatan_id'];
        $subJabatan->nama = $validateData['nama'];
        $subJabatan->save();

        return redirect()->route('view.subJabatan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function editSubJabatan($id) {
        $subJabatan = subJabatan::find($id);
        $jabatan = Jabatan::all();
        return view('superadmin.subJabatan.edit_subJabatan', [
            'subJabatan' => $subJabatan,
            'jabatan' => $jabatan,
            'title' => 'Edit Sub Jabatan',
        ]);
    }

    public function updateSubJabatan(Request $request, $id) {
        $validateData = $request->validate([
            'jabatan_id' => 'required | exists:jabatans,id',
            'nama' => 'required | max:100',
        ]);
        $subJabatan = subJabatan::find($id);
        $subJabatan->jabatan_id = $validateData['jabatan_id'];
        $subJabatan->nama = $validateData['nama'];
        $subJabatan->save();

        return redirect()->route('view.subJabatan')->with('success', 'Data berhasil di update.');
    }

    public function deleteSubJabatan($id) {
        $subJabatan = subJabatan::find($id);
        $subJabatan->delete();

        return redirect()->route('view.subJabatan')->with('success', 'Data berhasil dihapus.');
    }
}
