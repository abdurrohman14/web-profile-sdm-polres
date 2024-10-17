<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\KemampuanBahasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class KembhsController extends Controller
{
    public function index()  {
        $personel = Auth::user()->personel;
        $kembhs = KemampuanBahasa::where('personel_id', $personel->id)->get();
        return view('personil.kembhs.index', [
            'title'=>'Data Pendidikan',
            'kembhs' => $kembhs,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.kembhs.create', [
            'title'=>'Tambah Pendidikan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'bahasa' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Save data to database (assuming you have a Pendidikan model)
        $kembhs = new KemampuanBahasa();
        $kembhs->personel_id = Auth::user()->personel->id;
        $kembhs->bahasa = $request->bahasa;
        $kembhs->status = $request->status;    
        $kembhs->save();
    
        return redirect()->route('personil.kembhs.index')->with('success', 'Bahasa berhasil ditambahkan');
    }
}
