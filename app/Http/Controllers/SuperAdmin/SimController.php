<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Sim;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SimController extends Controller
{
    public function index() {
        return view('superadmin.personil.create_personil');
    }

    public function getSims() {
        $sims = Sim::all();
        return response()->json(['data' => $sims]);
    }

    public function create() {
        $user = User::all();
        return view('superadmin.personil.create_personil', compact('user'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jenis' => 'required|string|max:255',
            'nomor' => 'required|string|max:255|unique:sims,nomor',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload file
        if ($request->hasFile('file')) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/sims', $fileName, 'public');
        }

        // Menambahkan data sim
        SIM::create([
            'user_id' => $request->user_id,
            'jenis' => $request->jenis,
            'nomor' => $request->nomor,
            'file' => $filePath,
        ]);

        // Redirect back dengan pesan sukes
        return response()->json(['success', 'Data SIM berhasil ditambahkan.']);
    }

    public function edit($id) {
        $sim = Sim::findOrFail($id);
        return response()->json(['sim' => $sim]);
    }

    public function update(Request $request, $id) {
        // validasi data
        $request->validate([
            'jenis' => 'required|string|max:255',
            'nomor' => 'required|string|max:255|unique:sims,nomor,'.$id,
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // cari data berdasarkan id
        $sim = Sim::findOrFail($id);

        if ($request->hasFile('file')) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/sims', $fileName, 'public');
            $sim->file = $filePath;
        }
    
        // update data SIM
        $sim->update([
            'jenis' => $request->jenis,
            'nomor' => $request->nomor,
            'file' => $sim->file,
        ]);
    
        // Redirect back dengan pesan suskes
        return response()->json(['success' => 'Data SIM berhasil diperbarui.']);
    }

    public function destroy($id) {
        // Cari data sim berdasarkan ID
        $sim = Sim::findOrFail($id);

        // Menghapus file gambar di public
        if ($sim->file) {
            Storage::disk('public')->delete($sim->file);
        }

        // Menghapus data sim dari database
        $sim->delete();

        // Return json dengan pesan sukses
        return response()->json(['success' => 'Data SIM berhasil dihapus.']);
    }

}
