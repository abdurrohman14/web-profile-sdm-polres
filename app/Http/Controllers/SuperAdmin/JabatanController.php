<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index() {
        $jabatan = Jabatan::with('parent')->get();
        return view('superadmin.jabatan.view_jabatan', compact('jabatan'));
    }
}
