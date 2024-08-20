<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Personel;
use Illuminate\Http\Request;

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
        $personel = Personel::with('jabatan', 'pangkat', 'pangkatPnsPolri', 'user')->get();
        // dd($personel);
        return view('personil.personil', [
            'personel' => $personel,
            'title' => 'Dashboard',
        ]);
        // return view('personil.personil', [
        //     'title' => 'Personil',
        // ]);
    }
}
