<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomepageController;
use App\Http\Controllers\Admin\HomepageInfoController;
use App\Http\Controllers\Admin\HomepageFeatureController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\LoginController;

// ===============================
// LOGIN (TANPA LOGIN)
// ===============================
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    session()->forget('login');
    return redirect('/admin/login');
});


// ===============================
// DASHBOARD
// ===============================
Route::get('/dashboard', [AdminHomepageController::class, 'index'])
    ->name('admin.dashboard');

// ===============================
// CRUD HOMEPAGE
// ===============================
Route::resource('homepage-info', HomepageInfoController::class);
Route::resource('homepage-features', HomepageFeatureController::class);

// ===============================
// PROFILE
// ===============================
Route::resource('profile', ProfileController::class);

// ===============================
// EVENT
// ===============================
Route::get('event', [EventController::class, 'index'])->name('event.index');
Route::get('event/create', [EventController::class, 'create'])->name('event.create');
Route::post('event', [EventController::class, 'store'])->name('event.store');
Route::get('event/{id_event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('event/{id_event}', [EventController::class, 'update'])->name('event.update');
Route::delete('event/{id_event}', [EventController::class, 'destroy'])->name('event.destroy');

// ===============================
// GALERI
// ===============================
Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('galeri/{id_galeri}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
Route::put('galeri/{id_galeri}', [GaleriController::class, 'update'])->name('galeri.update');
Route::delete('galeri/{id_galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

// Foto Galeri
Route::post('galeri/foto', [GaleriController::class, 'storeFoto'])->name('galeriFoto.store');
Route::delete('galeri/foto/{id_foto}', [GaleriController::class, 'destroyFoto'])->name('galeriFoto.destroy');
Route::post('galeri/foto/urutan', [GaleriController::class, 'updateUrutanFoto'])
    ->name('galeriFoto.updateUrutan');

// Galeri User
Route::get('galeri/user/{id_galeriuser}/edit', [GaleriController::class, 'editUser'])
    ->name('galeriUser.edit');
Route::put('galeri/user/{id_galeriuser}', [GaleriController::class, 'updateUser'])
    ->name('galeriUser.update');

// ===============================
// LOCATION
// ===============================
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location', [LocationController::class, 'store'])->name('location.store');
Route::get('location/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('location/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('location/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

// ===============================
// RESERVATION
// ===============================
Route::prefix('reservation')->name('reservation.')->group(function () {

    Route::get('/', [ReservationController::class, 'index'])->name('index');
    Route::get('/create', [ReservationController::class, 'create'])->name('create');
    Route::post('/store', [ReservationController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ReservationController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [ReservationController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [ReservationController::class, 'destroy'])->name('destroy');

    // Page Reservation
    Route::get('/page/{id}/edit', [ReservationController::class, 'editPage'])->name('editPage');
    Route::put('/page/{id}/update', [ReservationController::class, 'updatePage'])->name('updatePage');
});
