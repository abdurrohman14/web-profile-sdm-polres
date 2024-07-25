<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('admin');
    }

    public function superadmin()
    {
        return view('superadmin');
    }

    public function personil()
    {
        return view('personil');
    }
}
