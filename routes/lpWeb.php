<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPage\HeroesController;
use App\Http\Controllers\LandingPage\LpBeritaController;
use App\Http\Controllers\LandingPage\LpEventController;

Route::get('/', [HeroesController::class, 'index']);
Route::prefix('lp')->group(function () {
    Route::get('/berita', [LpBeritaController::class, 'index'])->name('lp.berita');

    // Events
    Route::get('/event', [LpEventController::class, 'index'])->name('lp.event');

});