<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SuperAdmin\HeroController;
use App\Http\Controllers\LandingPage\HeroesController;
use App\Http\Controllers\SuperAdmin\JabatanController;
use App\Http\Controllers\SuperAdmin\PartnerController;
use App\Http\Controllers\SuperAdmin\PersonilController;
use App\Http\Controllers\SuperAdmin\PangkatPolriController;
use App\Http\Controllers\SuperAdmin\pangkatPnsPolriController;
use App\Models\Role;

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
});

// Rute untuk Superadmin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', [RoleController::class, 'superadmin'])->name('superadmin');
    // Jabatan
    Route::get('/jabatan', [JabatanController::class, 'index'])->name('view.jabatan');
    // Pangkat Polri & PNS Polri
    Route::get('/pangkat', [PangkatPolriController::class, 'index'])->name('view.pangkat');
    Route::get('/pns', [pangkatPnsPolriController::class, 'index'])->name('view.pns');
    // Personel
    Route::get('/personel', [PersonilController::class, 'index'])->name('view.personel');

    // Hero
    Route::get('/hero', [HeroController::class, 'index'])->name('index.hero');
    Route::get('/hero/create', [HeroController::class, 'create'])->name('create.hero');
    Route::post('/hero/store', [HeroController::class, 'store'])->name('store.hero');
    Route::get('/hero/edit/{id}', [HeroController::class, 'edit'])->name('edit.hero');
    Route::post('/hero/update/{id}', [HeroController::class, 'update'])->name('update.hero');
    Route::delete('/hero/delete/{id}', [HeroController::class, 'delete'])->name('delete.hero');

    // Partner
    Route::get('/partner', [PartnerController::class, 'index'])->name('index.partner');
    Route::get('/partner/create', [PartnerController::class, 'create'])->name('create.partner');
    Route::post('/partner/store', [PartnerController::class, 'store'])->name('store.partner');
    Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('edit.partner');
    Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('update.partner');
    Route::delete('/partner/delete/{id}', [PartnerController::class, 'delete'])->name('delete.partner');
});

// Rute untuk Personil
Route::middleware(['auth', 'role:personil'])->group(function () {
    Route::get('/personil', [RoleController::class, 'personil'])->name('personil');
    Route::get('/personil/{id}/edit', [RoleController::class, 'edit'])->name('personil.edit');

});
