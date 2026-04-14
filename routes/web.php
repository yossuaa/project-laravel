<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactLocationController;
use App\Http\Controllers\ReservationController;

// FRONTEND HOME
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/frontend.profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/frontend.event', [EventController::class, 'index'])->name('event');
Route::get('/frontend.galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/frontend.kontaklokasi', [ContactLocationController::class, 'index'])->name('kontaklokasi');
Route::get('/frontend.reservation', [ReservationController::class, 'index'])->name('reservation');
Route::post('/frontend.reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{id}/pdf', [ReservationController::class, 'generatePdf'])->name('reservation.pdf');

// PROFILE PAGE
//Route::get('/profile', [ProfileController::class, 'index']);

// ADMIN ROUTES
Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin.php';
});
