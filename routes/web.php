<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;

Route::get('/error-404', function () {
    return view('pages.404');
})->name('errorPage');

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['Admin'])->group(function () {
        Route::get('buildings/show/{id}', [BuildingController::class, 'show']);
        Route::resource('buildings', BuildingController::class);
        Route::resource('floors', FloorController::class);
        Route::resource('flats', FlatController::class);

        Route::get('buildingscreate', [\App\Livewire\Building\Create::class])->name('buildingscreate');

        Route::prefix('admin')->group(function () {
            // Route::get('/', 'AdminController@index')->name('admin.dashboard');
            Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        });
    });
});

Route::get('bill', [BillController::class, 'showBillingForm']);

require __DIR__ . '/auth.php';
