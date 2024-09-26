<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PdfExportController extends Controller
{
    public function export($id)
    {
        $personel = Personel::with('PendidikanKepolisian', 'PendidikanUmum', 'RiwayatPangkat', 'RiwayatJabatan', 'PengembanganPelatihan', 'TandaKehormatan', 'KemampuanBahasa', 'PenugasanLuarStruktur')->findOrFail($id);

        // Menghitung lama jabatan
        $startDate = Carbon::parse($personel->tmt_status);
        $currentDate = Carbon::now();
        $duration = $startDate->diff($currentDate);

        $lamaJabatan = $duration->y . ' tahun ' . $duration->m . ' bulan ' . $duration->d . ' hari';

        $pdf = Pdf::loadView('personil.pdf', compact('personel', 'lamaJabatan'));

        return $pdf->stream($personel->user->name . '-' . $personel->nrp . '.pdf');
    }
}
