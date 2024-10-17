<?php

namespace App\Http\Controllers\Personil;

use App\Http\Controllers\Controller;
use App\Models\TandaKehormatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Personel;

class TankehController extends Controller
{
    public function index()  {
        $personel = Auth::user()->personel;
        $tankeh = TandaKehormatan::where('personel_id', $personel->id)->get();
        return view('personil.tankeh.index', [
            'title'=>'Data Pendidikan',
            'tankeh' => $tankeh,
            'personel' => $personel,
        ]);
    }

    public function create() {
        $personel = Personel::find(Auth::id());
        return view('personil.tankeh.create', [
            'title'=>'Tambah Pendidikan',
            'personel' => $personel,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'tanda_kehormatan' => 'required|string',
            'tmt' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/pendidikanKepolisian', $imageName);
            $validateData['gambar'] = $imageName;
        }
    
        // Save data to database (assuming you have a Pendidikan model)
        $tankeh = new TandaKehormatan();
        $tankeh->personel_id = Auth::user()->personel->id;
        $tankeh->tanda_kehormatan = $request->tanda_kehormatan;
        $tankeh->tmt = $request->tmt;
        $tankeh->gambar = $imageName;
    
        $tankeh->save();
    
        return redirect()->route('personil.tankeh.index')->with('success', 'Pengembangan berhasil ditambahkan');
    }
}
