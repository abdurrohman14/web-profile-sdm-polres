<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\PengembanganPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;


class PengpelController extends Controller
{
    public function index()  {
        $personel = Auth::user()->personel;
        $pengpel = PengembanganPelatihan::where('personel_id', $personel->id)->get();
        return view('personil.pengpel.index', [
            'title'=>'Data Pendidikan',
            'pengpel' => $pengpel,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.pengpel.create', [
            'title'=>'Tambah Pendidikan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'dikbang' => 'required|string',
            'tahun' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanKepolisian', $imageName);
            $validateData['gambar'] = $imageName;
        }
    
        // Save data to database (assuming you have a Pendidikan model)
        $pengpel = new PengembanganPelatihan();
        $pengpel->personel_id = Auth::user()->personel->id;
        $pengpel->dikbang = $request->dikbang;
        $pengpel->tahun = $request->tahun;
        $pengpel->gambar = $imageName;
    
        $pengpel->save();
    
        return redirect()->route('personil.pengpel.index')->with('success', 'Pengembangan berhasil ditambahkan');
    
    }
}
