<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Personel;
use App\Models\SubJabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonilsController extends Controller
{
    public function index(Request $request) {
        $userId = Auth::id();
        $user = User::find($userId);

        $userSubJabatan = $user->subJabatan ? $user->subJabatan->nama : null;
        // dd($userSubJabatan);

        $subJabatan = $request->input('subJabatan');
    
        // ambil semua data subJabatan
        $subJabatans = SubJabatan::pluck('nama', 'id'); // assuming SubJabatan model has `nama` and `id` fields
    
        if($userSubJabatan) {
            $personels = Personel::with('subJabatan', 'pangkat', 'pangkatPnsPolri', 'user')
                ->whereHas('subJabatan', function($query) use ($userSubJabatan) {
                    $query->where('nama', $userSubJabatan);
                })->get();
        } else {
            $personels = Personel::with('subJabatan', 'pangkat', 'pangkatPnsPolri', 'user')->get();
        }
        
        return view('admin.personil.viewPersonil', [
            'user' => $user,
            'personels' => $personels,
            'subJabatans' => $subJabatans,
            'subJabatan' => $subJabatan,
            'title' => 'Data Personil'
        ]);
    }
    
}
