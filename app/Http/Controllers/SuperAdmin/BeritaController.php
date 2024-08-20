<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    public function index() {
        $beritas = Berita::all();
        return view('superadmin.berita.view_berita', [
            'beritas' => $beritas,
            'title' => 'Berita'
        ]);
    }

    public function create() {
        return view('superadmin.berita.create_berita', [
            'title' => 'Tambah Berita'
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Validasi upload foto
            'judul' => 'required|max:100',
            'slug' => 'required|unique:beritas',
            'deskripsi' => 'required',
            'status' =>  'nullable|boolean',
        ]);

        // Upload File
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $validateData['foto'] = $imageName;
        }

        // Menyimpan data dalam database
        $beritas = new Berita();
        $beritas->judul = $validateData['judul'];
        $beritas->slug = $validateData['slug'];
        $beritas->deskripsi = $validateData['deskripsi'];
        $beritas->status = $validateData['status'] ?? false;
        $beritas->foto = $imageName; // Menyimpan foto dalam storage/app
        $beritas->save();

        return redirect()->route('view.berita')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id) {
        $beritas = Berita::find($id);
        return view('superadmin.berita.detail_berita', [
            'beritas' => $beritas,
            'title' => 'Detail Berita'
        ]);
    }

    public function edit($id) {
        $beritas = Berita::find($id);
        return view('superadmin.berita.edit_berita', [
            'beritas' => $beritas,
            'title' => 'Edit Berita'
        ]);
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'judul' => 'required|max:100',
            'slug' => 'required|unique:beritas,slug,'.$id,
            'deskripsi' => 'required',
            'status' =>  'nullable|boolean',
        ]);

        $beritas = Berita::find($id);

        if ($request->input('slug') !== $beritas->slug) {
            $request->validate([
                'slug' => 'unique:beritas',
            ]);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::delete('public/berita'.$beritas->photo);

            // Upload foto baru
            $image = $request->file('foto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $validateData['foto'] = $imageName;
        }

        $beritas->judul = $validateData['judul'];
        $beritas->slug = $request->input('slug', $beritas->slug);
        $beritas->deskripsi = $validateData['deskripsi'];
        $beritas->status = $validateData['status'] ?? false;

        if(isset($validateData['foto'])){
            $beritas->foto = $validateData['foto'];
        }

        $beritas->save();

        return redirect()->route('view.berita')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id) {
        $beritas = Berita::find($id);
        Storage::delete('public/berita'.$beritas->foto);
        $beritas->delete();

        return redirect()->route('view.berita')->with('success', 'Data berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function upload(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
        $file = $request->file('file');

        // Simpan file ke dalam penyimpanan
        $path = $file->store('public/berita/body');

        // Dapatkan URL gambar dari penyimpanan
        $url = Storage::url($path);

        return response()->json(['url' => $url]);
    }

    public function status(Request $request, $id){
        $beritas =  Berita::findOrFail($id);
        $status = $request->input('status');
        $beritas->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status berhasil ditambahkan');
    }
}
