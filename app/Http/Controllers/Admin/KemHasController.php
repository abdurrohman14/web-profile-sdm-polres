<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KemampuanBahasa;
use App\Http\Controllers\Controller;

class KemHasController extends Controller
{
    public function index(){
        $kemhas = KemampuanBahasa::with('personel')->get();
        return view('admin.kemampuanBahasa.view_kemhas', [
            'kemhas' => $kemhas,
            'title' => 'Kemampuan Bahasa'
        ]);
    }
}
