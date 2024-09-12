<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportController extends Controller
{
    public function export($id)
    {
        $personel = Personel::findOrFail($id);

        $pdf = Pdf::loadView('personil.pdf', compact('personel'));

        return $pdf->download($personel->user->name . '-' . $personel->nrp . '.pdf');
    }
}
