<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\pangkat_pns_polri;
use App\Models\subPnsPolri;
use Illuminate\Http\Request;

class pangkatPnsPolriController extends Controller
{
    public function index() {
        $pnsPolri = pangkat_pns_polri::all();
        return view('superadmin.pangkat.view_pns_polri', [
            'pnsPolri' => $pnsPolri,
            'title' => 'PNS Polri',
        ]);
    }

    public function create() {
        return view('superadmin.pangkat.create_pns_polri', [
            'title' => 'Tambah PNS Polri',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $pnsPolri = new pangkat_pns_polri();
        $pnsPolri->nama = $validateData['nama'];
        $pnsPolri->save();

        return redirect()->route('view.pns')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $pnsPolri = pangkat_pns_polri::find($id);
        return view('superadmin.pangkat.edit_pns_polri', [
            'pangkatPolri' => $pnsPolri,
            'title' => 'Edit PNS Polri',
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nama' => 'required | max:100',
        ]);

        $pnsPolri = pangkat_pns_polri::find($id);
        $pnsPolri->nama = $validatedData['nama'];

        return redirect()->route('view.pns')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $pnsPolri = pangkat_pns_polri::find($id);
        $pnsPolri->delete();

        return redirect()->route('view.pns')->with('success', 'Data berhasil dihapus');
    }

    // Sub PNS Polri Controller
    public function viewSubPns() {
        $subPns = subPnsPolri::with('pangkatPnsPolri')->get();
        return view('superadmin.subPnsPolri.view_subPnsPolri', [
            'subPns' => $subPns,
            'title' => 'Data PNS Polri',
        ]);
    }

    public function createSubPns() {
        $pangkatPns = pangkat_pns_polri::all();
        return view('superadmin.subPnsPolri.create_subPnsPolri', [
            'pangkatPns' => $pangkatPns,
            'title' => 'Tambah PNS Polri',
        ]);
    }

    public function storeSubPns(Request $request) {
        $validatedData = $request->validate([
            'pangkat_pns_polri_id' => 'required | exists:pangkat_pns_polris,id',
            'nama' => 'required | max:100',
        ]);

        $subPns = new subPnsPolri();
        $subPns->pangkat_pns_polri_id = $validatedData['pangkat_pns_polri_id'];
        $subPns->nama = $validatedData['nama'];
        $subPns->save();

        return redirect()->route('view.subPns')->with('success', 'Data berhasil ditambah');
    }

    public function editSubPns($id) {
        $subPns = subPnsPolri::find($id);
        $pangkatPns = pangkat_pns_polri::all();
        return view('superadmin.subPnsPolri.edit_subPnsPolri', [
            'subPns' => $subPns,
            'pangkatPns' => $pangkatPns,
            'title' => 'Edit PNS Polri',
        ]);
    }

    public function updateSubPns(Request $request, $id) {
        $validatedData = $request->validate([
            'pangkat_pns_polri_id' => 'required | exists:pangkat_pns_polris,id',
            'nama' => 'required | max:100',
        ]);
        
        $subPns = subPnsPolri::find($id);
        $subPns->pangkat_pns_polri_id = $validatedData['pangkat_pns_polri_id'];
        $subPns->nama = $validatedData['nama'];
        $subPns->save();

        return redirect()->route('view.subPns')->with('success', 'Data berhasil diubah');
    }

    public function deleteSubPns($id) {
        $subPns = subPnsPolri::find($id);
        $subPns->delete();
        return redirect()->route('view.subPns')->with('success', 'Data berhasil dihapus');
    }
}
