<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendidikanKepolisian;
use Illuminate\Http\Request;

class DikPolController extends Controller
{
    public function index() {
        $dikpol = PendidikanKepolisian::with('personel')->get();
        return view('admin.pendidikanKepolisian.view_dikpol',[
            'title' => 'Pendidikan Kepolisian',
            'dikpol' => $dikpol,
        ]);
    }

    public function show($id) {
        $dikpol = PendidikanKepolisian::findOrfail($id);
        return view('admin.pendidikanKepolisian.detail_dikpol',[
            'title' => 'Pendidikan Kepolisian',
            'dikpol' => $dikpol,
        ]);
    }
}
