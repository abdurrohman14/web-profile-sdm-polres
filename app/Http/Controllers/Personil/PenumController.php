<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\PendidikanUmum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenumController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $pendidikanUmum = PendidikanUmum::where('personel_id', $personel->id)->get();
        return view('personil.pendidikanUmum.index', [
            'title' => 'Data Pendidikan Umum',
            'pendidikanUmum' => $pendidikanUmum,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        $tingkatPendidikanUmum = ['SD', 'SMP', 'SMA', 'SMK', 'D1', 'D2', 'D3', 'Sarjana', 'Magister', 'Doktor'];
        return view('personil.pendidikanUmum.create', [
            'title' => 'Tambah Pendidikan',
            'tingkatPendidikanUmum' => $tingkatPendidikanUmum,
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tingkat' => 'required|string',
            'nama_institusi' => 'required|string',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanUmum', $imageName);
            $validateData['gambar'] = $imageName;
        }
    
        // Save data to database (assuming you have a Pendidikan model)
        $pendidikan = new PendidikanUmum();
        $pendidikan->personel_id = Auth::user()->personel->id;
        $pendidikan->tingkat = $request->tingkat;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->tahun = $request->tahun;
        $pendidikan->gambar = $imageName;
    
        $pendidikan->save();
    
        return redirect()->route('personil.penum.index')->with('success', 'Pendidikan berhasil ditambahkan');
    
    }
}
