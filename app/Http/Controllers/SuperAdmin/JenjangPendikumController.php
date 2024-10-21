<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;

class JenjangPendikumController extends Controller
{
    public function index() {
        $jenjangPendikum = JenjangPendidikan::all();
        return view('superadmin.JenjangPendikum.jenjang_index',[
            'jenjangPendikum' => $jenjangPendikum,
            'title' => 'Jenjang Pendidikan'
        ]);
    }

    public function create() {
        return view('superadmin.JenjangPendikum.jenjang_create',[
            'title' => 'Tambah Jenjang Pendidikan',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|string',
        ]);

        $jenjangPendikum = new JenjangPendidikan();
        $jenjangPendikum->nama = $validateData['nama'];
        $jenjangPendikum->save();

        return redirect()->route('view.jenjang')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $jenjangPendikum = JenjangPendidikan::find($id);
        return view('superadmin.JenjangPendikum.jenjang_edit',[
            'jenjangPendikum' => $jenjangPendikum,
            'title' => 'Edit Jenjang Pendidikan',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nama' => 'required|string',
        ]);

        $jenjangPendikum = JenjangPendidikan::find($id);

        $jenjangPendikum->nama = $validateData['nama'];
        $jenjangPendikum->save();
        return redirect()->route('view.jenjang')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $jenjangPendikum = JenjangPendidikan::find($id);
        $jenjangPendikum->delete();
        return redirect()->route('view.jenjang')->with('success', 'Data berhasil dihapus');
    }
}
