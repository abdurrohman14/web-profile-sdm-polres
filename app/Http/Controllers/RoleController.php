<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Personel;


class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function superadmin()
    {
        return view('superadmin.superadmin');
    }

    public function personil()
    {
            $personel = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri', 'user') ->get();
            return view('personil.personil', [
                'personel' => $personel,
                'title' => 'Dashboard'
            ]);
    }

    public function edit($id)
    {
        $personel = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri', 'user')->findOrFail($id);

        if (!$personel) {
            abort(404, 'Personel not found');
        }

        return view('edit.personil', [
            'personel' => $personel,
            'title' => 'Ubah Biodata'
        ]);
    }
}
