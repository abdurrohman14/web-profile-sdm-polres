<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\HeroesController;
use App\Http\Controllers\LandingPage\LpBeritaController;
use App\Http\Controllers\LandingPage\LpEventController;

Route::get('/', [HeroesController::class, 'index']);
Route::prefix('lp')->group(function () {
    Route::get('/berita', [LpBeritaController::class, 'index'])->name('lp.berita');
    Route::get('/berita/search', [LpBeritaController::class, 'search'])->name('lp.berita.search');
    Route::get('/berita/detail/{slug}', [LpBeritaController::class, 'show'])->name('lp.berita.show');

    // Events
    Route::get('/event', [LpEventController::class, 'index'])->name('lp.event');
    Route::get('/event/search', [LpEventController::class, 'search'])->name('lp.event.search');
    Route::get('/event/detail/{id}', [LpEventController::class, 'show'])->name('lp.event.show');

});