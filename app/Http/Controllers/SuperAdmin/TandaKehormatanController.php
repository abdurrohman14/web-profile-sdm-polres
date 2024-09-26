<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Models\TandaKehormatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TandaKehormatanController extends Controller
{
    public function index() {
        $tanker = TandaKehormatan::with('personel')->get();

        return view('superadmin.tandaKehormatan.view_kehormatan', [
            'tanker' => $tanker,
            'title' => 'Tanda Kehormatan',
        ]);
    }

    public function create() {
        $personels = Personel::all();
        return view('superadmin.tandaKehormatan.create_kehormatan', [
            'personels' => $personels,
            'title' => 'Tanda Kehormatan',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'tanda_kehormatan' => 'required|string|max:255',
            'tmt' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        // upload image
        if($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/tandaKehormatan', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {
            $tanker = TandaKehormatan::create($validateData);

            return redirect()->route('view.tanda-kehormatan')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('Data gagal ditambahkan'. $th->getMessage());
        }
    }

    public function edit($id) {
        $tanker = TandaKehormatan::with('personel')->find($id);
        $personels = Personel::all();
        return view('superadmin.tandaKehormatan.edit_kehormatan', [
            'tanker' => $tanker,
            'personels' => $personels,
            'title' => 'Tanda Kehormatan',
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'personel_id' => 'required|exists:personels,id',
            'tanda_kehormatan' => 'required|string|max:255',
            'tmt' => 'required|numeric|digits:4',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        $tanker = TandaKehormatan::findOrfail($id);
         // upload image
         if($request->hasFile('gambar')) {
            Storage::delete('public/tandaKehormatan/' . $tanker->gambar);
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/tandaKehormatan/', $imageName);
            $validateData['gambar'] = $imageName;
        }

        try {

            $tanker->update($validateData);

            return redirect()->route('view.tanda-kehormatan')->with('success', 'Data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('Data gagal di update' . $th->getMessage());
        }
    }

    public function delete($id) {
        try {
            $tanker = TandaKehormatan::findOrfail($id);

             // hapus foto
             if (file_exists(public_path('storage/tandaKehormatan/' . $tanker->gambar))) {
                unlink(public_path('storage/tandaKehormatan/' . $tanker->gambar));
            }

            $tanker->delete();
            return redirect()->route('view.tanda-kehormatan')->with('success', 'Data berhasil di hapus');
        } catch (\Throwable $th) {
            return back()->with('Data gagal di hapus' . $th->getMessage());
        }
    }
}
