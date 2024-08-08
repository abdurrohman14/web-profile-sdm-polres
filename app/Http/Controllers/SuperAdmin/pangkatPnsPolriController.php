<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\pangkat_pns_polri;
use Illuminate\Http\Request;

class pangkatPnsPolriController extends Controller
{
    public function index() {
        $pnsPolri = pangkat_pns_polri::with('parent')->get();
        return view('superadmin.pangkat.view_pns_polri', compact('pnsPolri'));
    }
}
