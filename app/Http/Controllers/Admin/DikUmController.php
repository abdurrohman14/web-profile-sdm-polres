<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendidikanKepolisian;
use App\Models\PendidikanUmum;
use Illuminate\Http\Request;

class DikUmController extends Controller
{
    public function index() {
        $dikum = PendidikanUmum::with('personel')->get();
        return view('admin.pendidikanUmum.view_dikum',[
            'title' => 'Pendidikan Umum',
            'dikum' => $dikum,
        ]);
    }

    public function show($id) {
        $dikum = PendidikanUmum::findOrfail($id);
        return view('admin.pendidikanUmum.detail_dikum',[
            'title' => 'Pendidikan Umum',
            'dikum' => $dikum,
        ]);
    }
}
