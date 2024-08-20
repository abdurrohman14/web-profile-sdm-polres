<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function index() {
        $partners = Partner::all();
        return view('superadmin.partner.view_partner', [
            'partners' => $partners,
            'title' => 'Partner',
        ]);
    }

    public function create() {
        return view('superadmin.partner.add_partner', [
            'title' => 'Add Partner',
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/hero', $gambarName);
            $validateData['gambar'] = $gambarName;
        }

        $partners = new Partner();
        // $partners->gambar = $validateData['gambar'] ?? null;
        $partners->gambar = $gambarName;
        $partners->save();

        return redirect()->route('index.partner')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id) {
        $partners = Partner::find($id);
        return view('superadmin.partner.edit_partner', compact('partners'));
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->storeAs('public/hero', $gambarName);
            $validateData['gambar'] = $gambarName;
        }
        
        $partners = Partner::find($id);
        if(isset($validateData['gambar'])) {
            $partners->gambar = $validateData['gambar'];
        }

        $partners->save();

        return redirect()->route('index.partner')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id) {
        $partners = Partner::find($id);
        $partners->delete();

        return redirect()->route('index.partner')->with('success', 'Data Berhasil Dihapus');
    }
}
