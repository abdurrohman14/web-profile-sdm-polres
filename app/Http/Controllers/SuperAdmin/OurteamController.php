<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Jabatan;
use App\Models\Ourteam;
use App\Models\Pangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurteamController extends Controller
{
    public function index() {
        $ourteams = Ourteam::with('pangkat', 'jabatan')->get();
        return view('superadmin.ourteam.view_team', [
            'ourteams' => $ourteams,
            'title' => 'Team'
        ]);
    }

    public function create() {
        $pangkat = Pangkat::all();
        $jabatan = Jabatan::all();
        return view('superadmin.ourteam.add_team', [
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'title' => 'Add Team'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required',
            'pangkat_id' => 'required|exists:pangkats,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'nrp' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/team', $gambarName);
            $validateData['gambar'] = $gambarName;
        }

        $ourteams = new Ourteam();
        $ourteams->nama = $validateData['nama'];
        $ourteams->pangkat_id = $validateData['pangkat_id'];
        $ourteams->jabatan_id = $validateData['jabatan_id'];
        $ourteams->nrp = $validateData['nrp'];
        $ourteams->gambar = $gambarName;
        $ourteams->save();

        return redirect()->route('index.team')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $ourteams = Ourteam::with('pangkat', 'jabatan')->find($id);
        $pangkat = Pangkat::all();
        $jabatan = Jabatan::all();
        return view('superadmin.ourteam.edit_team', [
            'ourteams' => $ourteams,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'title' => 'Edit Team'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nama' => 'required',
            'pangkat_id' => 'required|exists:pangkats,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'nrp' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $ourteams = Ourteam::find($id);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/team', $gambarName);
            $validateData['gambar'] = $gambarName;
            $ourteams->gambar = $gambarName;
        }

        $ourteams->nama = $validateData['nama'];
        $ourteams->pangkat_id = $validateData['pangkat_id'];
        $ourteams->jabatan_id = $validateData['jabatan_id'];
        $ourteams->nrp = $validateData['nrp'];

        if(isset($validateData['gambar'])) {
            $ourteams->gambar = $validateData['gambar'];
        }

        $ourteams->save();

        return redirect()->route('index.team')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id) {
        $ourteams = Ourteam::find($id);
        $ourteams->delete();
        
        return redirect()->route('index.team')->with('success', 'Data berhasil dihapus');
    }
}
