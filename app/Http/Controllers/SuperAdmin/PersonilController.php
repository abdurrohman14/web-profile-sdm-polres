<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Personel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonilController extends Controller
{
    public function index() {
        $personels = Personel::all();
        return view('superadmin.personil.view_personil', compact('personels'));
    }
}
