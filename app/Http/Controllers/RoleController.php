<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('admin.admin', [
            'title' => 'Admin',
        ]);
    }

    public function superadmin()
    {
        return view('superadmin.superadmin', [
            'title' => 'Super Admin',
        ]);
    }

    public function personil()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();
    
        // Ambil data personel yang terkait dengan pengguna
        $personel = Personel::where('user_id', $userId)->first();
        
        // Periksa apakah data personel ditemukan
        if (!$personel) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk pengguna ini.');
        };
            
        return view('personil.personil', [
            'personel' => $personel,
            'title' => 'Dashboard'
        ]);
    }

    public function show($id) {
        $personel = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri')->findOrFail($id);

        return view('personil.detail', [
            'personel' => $personel,
            'title' => 'Detail Personel',
        ]);
    }

    public function edit($id) {
        $personel = Personel::findOrFail($id);
        return view('personil.edit', [
            'personel' => $personel,
            'title' => 'Edit Personel',
        ]);
    }
}
