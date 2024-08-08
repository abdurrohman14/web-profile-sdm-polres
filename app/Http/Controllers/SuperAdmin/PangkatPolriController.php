<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PangkatPolriController extends Controller
{
    public function index() {
        $pangkatPolri = Pangkat::with('parent')->get();
        return view('superadmin.pangkat.view_pangkat_polri', compact('pangkatPolri'));
    }
}
