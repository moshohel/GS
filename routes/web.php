<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\http\Controllers\BuildingController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

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

Route::prefix('buildings')->group(function () {
    Route::get('/index', [BuildingController::class, 'index'])->name('buildings.index');
    Route::get('/create', [BuildingController::class, 'create'])->name('buildings.create');
});


require __DIR__ . '/auth.php';
