<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PersonilsController;
use App\Http\Controllers\SuperAdmin\HeroController;
use App\Http\Controllers\SuperAdmin\BeritaController;
use App\Http\Controllers\LandingPage\HeroesController;
use App\Http\Controllers\SuperAdmin\JabatanController;
use App\Http\Controllers\SuperAdmin\OurteamController;
use App\Http\Controllers\SuperAdmin\PartnerController;
use App\Http\Controllers\SuperAdmin\PersonilController;
use App\Http\Controllers\SuperAdmin\PangkatPolriController;
use App\Http\Controllers\SuperAdmin\pangkatPnsPolriController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HeroesController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rute untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [RoleController::class, 'admin'])->name('admin');

        // Personel
        Route::prefix('person')->group(function () {
            Route::get('/', [PersonilsController::class, 'index'])->name('index.person');
            // Route::get('/create', [PersonilController::class, 'create'])->name('create.personel');
            // Route::post('/store', [PersonilController::class, 'store'])->name('store.personel');
            // Route::get('/detail/{id}', [PersonilController::class, 'show'])->name('show.personel');
            // Route::get('/edit/{id}', [PersonilController::class, 'edit'])->name('edit.personel');
            // Route::post('/update/{id}', [PersonilController::class, 'update'])->name('update.personel');
            // Route::delete('/delete/{id}', [PersonilController::class, 'delete'])->name('delete.personel');
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
    Route::prefix('pns')->group(function () {
        Route::get('/', [pangkatPnsPolriController::class, 'index'])->name('view.pns');
        Route::get('/create', [pangkatPnsPolriController::class, 'create'])->name('create.pns');
        Route::post('/store', [pangkatPnsPolriController::class, 'store'])->name('store.pns');
        Route::get('/edit/{id}', [pangkatPnsPolriController::class, 'edit'])->name('edit.pns');
        Route::post('/update/{id}', [pangkatPnsPolriController::class, 'update'])->name('update.pns');
        Route::delete('/delete/{id}', [pangkatPnsPolriController::class, 'delete'])->name('delete.pns');
    });
    
    // Sub PNS Polri
    Route::prefix('subpns')->group(function () {
        Route::get('/', [pangkatPnsPolriController::class, 'viewSubPns'])->name('view.subPns');
        Route::get('/create', [pangkatPnsPolriController::class, 'createSubPns'])->name('create.subPns');
        Route::post('/store', [pangkatPnsPolriController::class, 'storeSubPns'])->name('store.subPns');
        Route::get('/edit/{id}', [pangkatPnsPolriController::class, 'editSubPns'])->name('edit.subPns');
        Route::post('/update/{id}', [pangkatPnsPolriController::class, 'updateSubPns'])->name('update.subPns');
        Route::delete('/delete/{id}', [pangkatPnsPolriController::class, 'deleteSubPns'])->name('delete.subPns');
    });

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
});

// Rute untuk Personil
Route::middleware(['auth', 'role:personil'])->group(function () {
    Route::get('/personil', [RoleController::class, 'personil'])->name('personil');
});

