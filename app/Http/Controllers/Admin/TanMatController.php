<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TandaKehormatan;
use App\Http\Controllers\Controller;

class TanMatController extends Controller
{
    public function index() {
        $tanmat = TandaKehormatan::with('personel')->get();

        return view('admin.tandaKehormatan.view_tanmat', [
            'tanmat' => $tanmat,
            'title' => 'Tanda Kehormatan',
        ]);
    }

}
