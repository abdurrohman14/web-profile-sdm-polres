<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\PengembanganPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class PengpelController extends Controller
{
    public function index() {
        $personel = Auth::user()->personel;
        $pengpel = PengembanganPelatihan::where('personel_id', $personel->id)->get();
        return view('personil.pengpel.index', [
            'title' => 'Data Pendidikan',
            'pengpel' => $pengpel,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.pengpel.create', [
            'title' => 'Tambah Pendidikan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'dikbang' => 'required|string',
            'tahun' => 'required|integer',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Memungkinkan untuk beberapa gambar
        ]);

        // Inisialisasi variabel gambar
        $imageName = null;

        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageNames = [];
            
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/pendidikanKepolisian', $imageName);
                $imageNames[] = $imageName;
            }

            // Gabungkan semua nama file gambar menjadi satu string
            $imageName = json_encode($imageNames); // Simpan sebagai array JSON
        }
    
        // Simpan data ke database
        $pengpel = new PengembanganPelatihan();
        $pengpel->personel_id = Auth::user()->personel->id;
        $pengpel->dikbang = $request->dikbang;
        $pengpel->tahun = $request->tahun;
        $pengpel->gambar = $imageName;
    
        $pengpel->save();
    
        return redirect()->route('personil.pengpel.index')->with('success', 'Pengembangan berhasil ditambahkan');
    }
}
