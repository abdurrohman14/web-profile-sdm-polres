<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfExportController;
use App\Http\Controllers\SuperAdmin\SimController;
use App\Http\Controllers\Admin\PersonilsController;
use App\Http\Controllers\SuperAdmin\HeroController;
use App\Http\Controllers\SuperAdmin\BeritaController;
use App\Http\Controllers\SuperAdmin\EventsController;
use App\Http\Controllers\LandingPage\HeroesController;
use App\Http\Controllers\SuperAdmin\JabatanController;
use App\Http\Controllers\SuperAdmin\OurteamController;
use App\Http\Controllers\SuperAdmin\PartnerController;
use App\Http\Controllers\SuperAdmin\PersonilController;
use App\Http\Controllers\SuperAdmin\PangkatPolriController;
use App\Http\Controllers\SuperAdmin\pangkatPnsPolriController;

// Route::get('/', [HeroesController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/lpWeb.php';

// Rute untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [RoleController::class, 'admin'])->name('admin');
    // bagops
    Route::middleware(['check.jabatan:bagops'])->prefix('person/bagops')->group(function () {
        Route::get('/binops', [PersonilsController::class, 'index'])->name('index.binops');
        Route::get('/dalops', [PersonilsController::class, 'index'])->name('index.dalops');
        Route::get('/kerma', [PersonilsController::class, 'index'])->name('index.kerma');
    });
    // bagren
    Route::middleware(['check.jabatan:bagren'])->prefix('person/bagren')->group(function () {
        Route::get('/renprogar', [PersonilsController::class, 'index'])->name('index.renprogar');
        Route::get('/dalprogar', [PersonilsController::class, 'index'])->name('index.dalprogar');
    });
    // bagsdm
    Route::middleware(['check.jabatan:bagsdm'])->prefix('person/bagsdm')->group(function () {
        Route::get('/binkar', [PersonilsController::class, 'index'])->name('index.binkar');
        Route::get('/dalpers', [PersonilsController::class, 'index'])->name('index.dalpers');
        Route::get('/watpers', [PersonilsController::class, 'index'])->name('index.watpers');
    });
    // baglog
    Route::middleware(['check.jabatan:baglog'])->prefix('person/baglog')->group(function () {
        Route::get('/bekpal', [PersonilsController::class, 'index'])->name('index.bekpal');
        Route::get('/faskon', [PersonilsController::class, 'index'])->name('index.faskon');
    });
    // siwas
    Route::middleware(['check.jabatan:siwas'])->prefix('person/siwas')->group(function () {
        Route::get('/subsiopsnal', [PersonilsController::class, 'index'])->name('index.subsiopsnal');
        Route::get('/subsibin', [PersonilsController::class, 'index'])->name('index.subsibin');
        Route::get('/subsidumas', [PersonilsController::class, 'index'])->name('index.subsidumas');
    });
    // sipromam
    Route::middleware(['check.jabatan:sipromam'])->prefix('person/sipromam')->group(function () {
        Route::get('/propam', [PersonilsController::class, 'index'])->name('index.propam');
        Route::get('/paminal', [PersonilsController::class, 'index'])->name('index.paminal');
    });
    // sihumas
    Route::middleware(['check.jabatan:sihumas'])->prefix('person/sihumas')->group(function () {
        Route::get('/pidm', [PersonilsController::class, 'index'])->name('index.pidm');
        Route::get('/penmas', [PersonilsController::class, 'index'])->name('index.penmas');
    });
    // sikum
    Route::middleware(['check.jabatan:sikum'])->prefix('person/sikum')->group(function () {
        Route::get('/bankum', [PersonilsController::class, 'index'])->name('index.bankum');
        Route::get('/luhkum', [PersonilsController::class, 'index'])->name('index.luhkum');
    });
    // sitik
    Route::middleware(['check.jabatan:sitik'])->prefix('person/sitik')->group(function () {
        Route::get('/tekkom', [PersonilsController::class, 'index'])->name('index.tekkom');
        Route::get('/tekinfo', [PersonilsController::class, 'index'])->name('index.tekinfo');
    });
    // sium
    Route::middleware(['check.jabatan:sium'])->prefix('person/sium')->group(function () {
        Route::get('/mintu', [PersonilsController::class, 'index'])->name('index.mintu');
        Route::get('/yanma', [PersonilsController::class, 'index'])->name('index.yanma');
    });
    // spkt
    Route::middleware(['check.jabatan:spkt'])->prefix('person/spkt')->group(function () {
        Route::get('/spkt', [PersonilsController::class, 'index'])->name('index.spkt');
    });
    // satintelkum
    Route::middleware(['check.jabatan:satintelkum'])->prefix('person/satintelkum')->group(function () {
        Route::get('/intelkum', [PersonilsController::class, 'index'])->name('index.intelkum');
    });
    // satreskim
    Route::middleware(['check.jabatan:satreskim'])->prefix('person/satreskim')->group(function () {
        Route::get('/reskim', [PersonilsController::class, 'index'])->name('index.reskim');
    });
    // satnarkoba
    Route::middleware(['check.jabatan:satnarkoba'])->prefix('person/satnarkoba')->group(function () {
        Route::get('/narkoba', [PersonilsController::class, 'index'])->name('index.narkoba');
    });
    // satbinmas
    Route::middleware(['check.jabatan:satbinmas'])->prefix('person/satbinmas')->group(function () {
        Route::get('/binmas', [PersonilsController::class, 'index'])->name('index.binmas');
    });
    // satsamapta
    Route::middleware(['check.jabatan:satsamapta'])->prefix('person/satsamapta')->group(function () {
        Route::get('/samapta', [PersonilsController::class, 'index'])->name('index.samapta');
    });
    // satlantas
    Route::middleware(['check.jabatan:satlantas'])->prefix('person/satlantas')->group(function () {
        Route::get('/lantas', [PersonilsController::class, 'index'])->name('index.lantas');
    });
    // satpamobvit
    Route::middleware(['check.jabatan:satpamobvit'])->prefix('person/satpamobvit')->group(function () {
        Route::get('/pamobvit', [PersonilsController::class, 'index'])->name('index.pamobvit');
    });
    // satpolairud
    Route::middleware(['check.jabatan:satpolairud'])->prefix('person/satpolairud')->group(function () {
        Route::get('/polairud', [PersonilsController::class, 'index'])->name('index.polairud');
    });
    // sattahti
    Route::middleware(['check.jabatan:sattahti'])->prefix('person/sattahti')->group(function () {
        Route::get('/tahti', [PersonilsController::class, 'index'])->name('index.tahti');
    });
    // sikeu
    Route::middleware(['check.jabatan:sikeu'])->prefix('person/sikeu')->group(function () {
        Route::get('/gaji', [PersonilsController::class, 'index'])->name('index.gaji');
        Route::get('/verif', [PersonilsController::class, 'index'])->name('index.verif');
        Route::get('/apk', [PersonilsController::class, 'index'])->name('index.apk');
    });
    // sidokkes
    Route::middleware(['check.jabatan:sidokkes'])->prefix('person/sidokkes')->group(function () {
        Route::get('/dokpol', [PersonilsController::class, 'index'])->name('index.dokpol');
        Route::get('/sikespol', [PersonilsController::class, 'index'])->name('index.sikespol');
    });
    // Personel
    Route::prefix('person')->group(function () {
        Route::get('/', [PersonilsController::class, 'index'])->name('index.person');
        Route::get('/create', [PersonilsController::class, 'create'])->name('create.person');
        Route::post('/store', [PersonilsController::class, 'store'])->name('store.person');
        Route::get('/detail/{id}', [PersonilsController::class, 'show'])->name('show.person');
        Route::get('/edit/{id}', [PersonilsController::class, 'edit'])->name('edit.person');
        Route::post('/update/{id}', [PersonilsController::class, 'update'])->name('update.person');
        Route::delete('/delete/{id}', [PersonilsController::class, 'delete'])->name('delete.person');
        Route::get('/export/{id}', [PdfExportController::class, 'export'])->name('export.person');
    });
});

// Rute untuk Superadmin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', [RoleController::class, 'superadmin'])->name('superadmin');
    
    // Jabatan
    Route::prefix('jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('view.jabatan');
        Route::get('/create', [JabatanController::class, 'create'])->name('create.jabatan');
        Route::post('/store', [JabatanController::class, 'store'])->name('store.jabatan');
        Route::get('/edit/{id}', [JabatanController::class,'edit'])->name('edit.jabatan');
        Route::post('/update/{id}', [JabatanController::class,'update'])->name('update.jabatan');
        Route::delete('/delete/{id}', [JabatanController::class,'delete'])->name('delete.jabatan');
    });
    
    // Sub Jabatan
    Route::prefix('subjabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'viewSubJabatan'])->name('view.subJabatan');
        Route::get('/create', [JabatanController::class, 'createSubJabatan'])->name('create.subJabatan');
        Route::post('/store', [JabatanController::class, 'storeSubJabatan'])->name('store.subJabatan');
        Route::get('/edit/{id}', [JabatanController::class,'editSubJabatan'])->name('edit.subJabatan');
        Route::post('/update/{id}', [JabatanController::class,'updateSubJabatan'])->name('update.subJabatan');
        Route::delete('/delete/{id}', [JabatanController::class,'deleteSubJabatan'])->name('delete.subJabatan');
    });

    // Pangkat Polri
    Route::prefix('pangkat')->group(function () {
        Route::get('/', [PangkatPolriController::class, 'index'])->name('view.pangkat');
        Route::get('/create', [PangkatPolriController::class, 'create'])->name('create.pangkat');
        Route::post('/store', [PangkatPolriController::class, 'store'])->name('store.pangkat');
        Route::get('/edit/{id}', [PangkatPolriController::class, 'edit'])->name('edit.pangkat');
        Route::post('/update/{id}', [PangkatPolriController::class, 'update'])->name('update.pangkat');
        Route::delete('/delete/{id}', [PangkatPolriController::class, 'delete'])->name('delete.pangkat');
    });

    // Sub Pangkat Polri
    Route::prefix('subpangkat')->group(function () {
        Route::get('/', [PangkatPolriController::class, 'viewSubPangkat'])->name('view.subPangkat');
        Route::get('/create', [PangkatPolriController::class, 'createSubPangkat'])->name('create.subPangkat');
        Route::post('/store', [PangkatPolriController::class, 'storeSubPangkat'])->name('store.subPangkat');
        Route::get('/edit/{id}', [PangkatPolriController::class,'editSubPangkat'])->name('edit.subPangkat');
        Route::post('/update/{id}', [PangkatPolriController::class,'updateSubPangkat'])->name('update.subPangkat');
        Route::delete('/delete/{id}', [PangkatPolriController::class,'deleteSubPangkat'])->name('delete.subPangkat');
    });

    // Pangkat PNS Polri
    // Route::prefix('pns')->group(function () {
    //     Route::get('/', [pangkatPnsPolriController::class, 'index'])->name('view.pns');
    //     Route::get('/create', [pangkatPnsPolriController::class, 'create'])->name('create.pns');
    //     Route::post('/store', [pangkatPnsPolriController::class, 'store'])->name('store.pns');
    //     Route::get('/edit/{id}', [pangkatPnsPolriController::class, 'edit'])->name('edit.pns');
    //     Route::post('/update/{id}', [pangkatPnsPolriController::class, 'update'])->name('update.pns');
    //     Route::delete('/delete/{id}', [pangkatPnsPolriController::class, 'delete'])->name('delete.pns');
    // });
    
    // Sub PNS Polri
    // Route::prefix('subpns')->group(function () {
    //     Route::get('/', [pangkatPnsPolriController::class, 'viewSubPns'])->name('view.subPns');
    //     Route::get('/create', [pangkatPnsPolriController::class, 'createSubPns'])->name('create.subPns');
    //     Route::post('/store', [pangkatPnsPolriController::class, 'storeSubPns'])->name('store.subPns');
    //     Route::get('/edit/{id}', [pangkatPnsPolriController::class, 'editSubPns'])->name('edit.subPns');
    //     Route::post('/update/{id}', [pangkatPnsPolriController::class, 'updateSubPns'])->name('update.subPns');
    //     Route::delete('/delete/{id}', [pangkatPnsPolriController::class, 'deleteSubPns'])->name('delete.subPns');
    // });

    // Hero
    Route::prefix('hero')->group(function () {
        Route::get('/', [HeroController::class, 'index'])->name('index.hero');
        Route::get('/create', [HeroController::class, 'create'])->name('create.hero');
        Route::post('/store', [HeroController::class, 'store'])->name('store.hero');
        Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('edit.hero');
        Route::post('/update/{id}', [HeroController::class, 'update'])->name('update.hero');
        Route::delete('/delete/{id}', [HeroController::class, 'delete'])->name('delete.hero');
    });

    // Partner
    Route::prefix('partner')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('index.partner');
        Route::get('/create', [PartnerController::class, 'create'])->name('create.partner');
        Route::post('/store', [PartnerController::class, 'store'])->name('store.partner');
        Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit.partner');
        Route::post('/update/{id}', [PartnerController::class, 'update'])->name('update.partner');
        Route::delete('/delete/{id}', [PartnerController::class, 'delete'])->name('delete.partner');
    });

    // Ourteam
    Route::prefix('ourteam')->group(function () {
        Route::get('/', [OurteamController::class, 'index'])->name('index.team');
        Route::get('/create', [OurteamController::class, 'create'])->name('create.team');
        Route::post('/store', [OurteamController::class, 'store'])->name('store.team');
        Route::get('/edit/{id}', [OurteamController::class, 'edit'])->name('edit.team');
        Route::post('/update/{id}', [OurteamController::class, 'update'])->name('update.team');
        Route::delete('/delete/{id}', [OurteamController::class, 'delete'])->name('delete.team');
    });
    
    // Personel
    Route::prefix('personel')->group(function () {
        Route::get('/', [PersonilController::class, 'index'])->name('view.personel');
        Route::get('/create', [PersonilController::class, 'create'])->name('create.personel');
        Route::post('/store', [PersonilController::class, 'store'])->name('store.personel');
        Route::get('/detail/{id}', [PersonilController::class, 'show'])->name('show.personel');
        Route::get('/edit/{id}', [PersonilController::class, 'edit'])->name('edit.personel');
        Route::post('/update/{id}', [PersonilController::class, 'update'])->name('update.personel');
        Route::delete('/delete/{id}', [PersonilController::class, 'delete'])->name('delete.personel');      
        Route::get('/export/{id}', [PdfExportController::class, 'export'])->name('export.personel');

        Route::prefix('sim')->group(function () {
            Route::get('/', [SimController::class, 'index'])->name('view.sim');
            Route::get('/data', [SimController::class, 'getSims'])->name('data.sim');
            Route::get('/create', [SimController::class, 'create'])->name('create.sim');
            Route::post('/store', [SimController::class, 'store'])->name('store.sim');
            Route::get('/edit/{id}', [SimController::class, 'edit'])->name('edit.sim');
            Route::post('/update/{id}', [SimController::class, 'update'])->name('update.sim');
            Route::delete('/delete/{id}', [SimController::class, 'destroy'])->name('delete.sim');
        });
    });

    // Berita
    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('view.berita');
        Route::get('/create', [BeritaController::class, 'create'])->name('create.berita');
        Route::get('/create/checkSlug', [BeritaController::class, 'checkSlug'])->name('check-slug');
        Route::post('/store', [BeritaController::class, 'store'])->name('store.berita');
        Route::post('/upload', [BeritaController::class, 'upload'])->name('upload');
        Route::get('/detail/{id}', [BeritaController::class, 'show'])->name('show.berita');
        Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('edit.berita');
        Route::post('/update/{id}', [BeritaController::class, 'update'])->name('update.berita');
        Route::delete('/delete/{id}', [BeritaController::class, 'delete'])->name('delete.berita');
        Route::post('{id}/status', [BeritaController::class, 'status'])->name('status.berita');
    });

    // Event
    Route::prefix('event')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('view.event');
        Route::get('/create', [EventsController::class, 'create'])->name('create.event');
        Route::post('/store', [EventsController::class, 'store'])->name('store.event');
        Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('edit.event');
        Route::post('/update/{id}', [EventsController::class, 'update'])->name('update.event');
        Route::delete('/delete/{id}', [EventsController::class, 'delete'])->name('delete.event');
    });
});

// Rute untuk Personil
Route::middleware(['auth', 'role:personil'])->group(function () {
    Route::prefix('personil')->group(function () {
        Route::get('/', [RoleController::class, 'personil'])->name('personil');
        Route::get('/{id}', [RoleController::class, 'show'])->name('personil.show');
        Route::get('/{id}/export', [PdfExportController::class, 'export'])->name('personil.export');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('personil.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('personil.update');
    });
});
