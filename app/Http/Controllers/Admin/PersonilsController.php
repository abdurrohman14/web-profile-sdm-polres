<?php

namespace App\Http\Controllers\Admin;

use App\Models\Personel;
use App\Models\SubJabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonilsController extends Controller
{
    public function index(Request $request) {
        $subJabatan = $request->input('subJabatan');
    
        // ambil semua data subJabatan
        $subJabatans = SubJabatan::pluck('nama', 'id'); // assuming SubJabatan model has `nama` and `id` fields
    
        if($subJabatan) {
            $personels = Personel::with('subJabatan', 'pangkat', 'pangkatPnsPolri', 'user')
                ->whereHas('subJabatan', function($query) use ($subJabatan) {
                    $query->where('nama', $subJabatan);
                })->get();
        } else {
            $personels = Personel::with('subJabatan', 'pangkat', 'pangkatPnsPolri', 'user')->get();
        }
        
        return view('admin.personil.viewPersonil', [
            'personels' => $personels,
            'subJabatans' => $subJabatans,
            'subJabatan' => $subJabatan,
            'title' => 'Data Personil'
        ]);
    }
    
}
