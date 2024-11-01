<?php

namespace App\Http\Controllers\Personil;

use Illuminate\Support\Facades\Storage;
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
            $pendidikan->gambar = json_encode($imageNames);
        }
    
        $pendidikan->save();
    
        return redirect()->route('personil.penpol.index')->with('success', 'Pendidikan berhasil ditambahkan');
    
    }
    
    // Menampilkan form edit
    public function edit($id)
    {
        $pendidikan = PendidikanKepolisian::findOrFail($id);
        $personel = Personel::find(Auth::id());
        $tingkatPendidikanKepolisian = ['Akpol', 'SIPSS', 'Bintara', 'Tamtama']; // Sesuaikan dengan opsi yang Anda miliki

        return view('personil.pendidikanKepolisian.edit', [
            'title'=>'Tambah Pendidikan',
            'personel' => $personel,
        ], compact('pendidikan', 'tingkatPendidikanKepolisian'));
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat' => 'required',
            'tahun' => 'required|numeric',
            'gambar.*' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $pendidikan = PendidikanKepolisian::findOrFail($id);
        $pendidikan->tingkat = $request->tingkat;
        $pendidikan->tahun = $request->tahun;

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

        return redirect()->route('personil.penpol.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pendidikan = PendidikanKepolisian::findOrFail($id);

        // Jika ada gambar yang terkait
        if ($pendidikan->gambar) {
            $images = explode(',', $pendidikan->gambar);

            foreach ($images as $image) {
                // Hapus file gambar dari storage
                if (Storage::exists('public/pendidikanKepolisian/' . $image)) {
                    Storage::delete('public/pendidikanKepolisian/' . $image);
                }
            }
        }

        // Hapus data dari database
        $pendidikan->delete();

        return redirect()->route('personil.penpol.index')->with('success', 'Data pendidikan berhasil dihapus');
    }

    
}
