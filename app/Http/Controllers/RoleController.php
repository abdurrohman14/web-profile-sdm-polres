<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

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
        return view('personil.personil');
    }
}
