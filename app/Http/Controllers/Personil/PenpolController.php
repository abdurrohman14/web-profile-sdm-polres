<?php

namespace App\Http\Controllers\Personil;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendidikanKepolisian;
use Illuminate\Support\Facades\Auth;

class PenpolController extends Controller
{
    public function index()  {
        $personel = Auth::user()->personel;
        $pendidikanKepolisian = PendidikanKepolisian::where('personel_id', $personel->id)->get();
        return view('personil.pendidikanKepolisian.index', [
            'title'=>'Data Pendidikan',
            'pendidikanKepolisian' => $pendidikanKepolisian,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        $tingkatPendidikanKepolisian = ['Akpol', 'SIPSS', 'Bintara', 'Tamtama'];
        return view('personil.pendidikanKepolisian.create', [
            'title'=>'Tambah Pendidikan',
            'tingkatPendidikanKepolisian' => $tingkatPendidikanKepolisian,
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tingkat' => 'required|string',
            'tahun' => 'required|integer',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // if ($request->hasFile('gambar')) {
        //     $image = $request->file('gambar');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/pendidikanKepolisian', $imageName);
        //     $validateData['gambar'] = $imageName;
        // }
    
        // Save data to database (assuming you have a Pendidikan model)
        $pendidikan = new PendidikanKepolisian();
        $pendidikan->personel_id = Auth::user()->personel->id;
        $pendidikan->tingkat = $request->tingkat;
        $pendidikan->tahun = $request->tahun;
        // $pendidikan->gambar = $imageName;
        // Jika ada file gambar yang diupload
    if($request->hasFile('gambar')) {
        $images = $request->file('gambar');
        $imageNames = [];
        
        foreach($images as $image) {
            // Buat nama file unik
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Simpan gambar ke folder public/pendidikanKepolisian
            $image->storeAs('public/pendidikanKepolisian', $imageName);
            
            // Simpan nama gambar dalam array
            $imageNames[] = $imageName;
        }
        
        // Ubah menjadi string yang bisa disimpan di database (misalnya dipisahkan koma)
        $pendidikan->gambar = implode(',', $imageNames);
    }
    
        $pendidikan->save();
    
        return redirect()->route('personil.penpol.index')->with('success', 'Pendidikan berhasil ditambahkan');
    
    }
}
