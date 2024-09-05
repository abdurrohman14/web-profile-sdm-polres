<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubJabatanAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $subJabatan): Response
    {
        $user = Auth::user();

        // Cek apakah user memiliki subJabatan yang diizinkan
        if ($user->subJabatan && strtolower($user->subJabatan->nama) === strtolower($subJabatan)) {
            return $next($request);
        }

        // Redirect atau abort jika user tidak memiliki akses ke subJabatan tersebut
        return redirect()->route('admin')->withErrors('Anda tidak memiliki akses ke subbag ini.');
    }
}
