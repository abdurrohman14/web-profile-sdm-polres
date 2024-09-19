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
            'judul' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Validasi upload foto
            'deskripsi' => 'required',
            'status' =>  'nullable|boolean',
        ]);

        // Upload File
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $validateData['gambar'] = $imageName;
        }

        // Menyimpan data dalam database
        $beritas = new Berita();
        $beritas->judul = $validateData['judul'];
        $beritas->slug = $validateData['slug'];
        $beritas->deskripsi = $validateData['deskripsi'];
        $beritas->status = $validateData['status'] ?? false;
        $beritas->gambar = $imageName; // Menyimpan foto dalam storage/app
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
            'judul' => 'required|max:255',
            'slug' => 'required|unique:beritas,slug,'.$id,
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'deskripsi' => 'required',
            'status' =>  'nullable|boolean',
        ]);

        $beritas = Berita::find($id);

        if ($request->input('slug') !== $beritas->slug) {
            $request->validate([
                'slug' => 'unique:beritas',
            ]);
        }

        if ($request->hasFile('gambar')) {
            // Hapus foto lama
            Storage::delete('public/berita'.$beritas->gambar);

            // Upload foto baru
            $image = $request->file('gambar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $validateData['gambar'] = $imageName;
        }

        $beritas->judul = $validateData['judul'];
        $beritas->slug = $request->input('slug', $beritas->slug);
        $beritas->deskripsi = $validateData['deskripsi'];
        $beritas->status = $validateData['status'] ?? false;

        if(isset($validateData['gambar'])){
            $beritas->gambar = $validateData['gambar'];
        }

        $beritas->save();

        return redirect()->route('view.berita')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id) {
        $beritas = Berita::find($id);
        Storage::delete('public/berita/'.$beritas->gambar);
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
