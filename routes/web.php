<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\http\Controllers\BuildingController;
use App\http\Controllers\FloorController;
use App\http\Controllers\FlatController;

Route::get('/', function () {
    dd('sdfkjsdfjsdfj');
    return view('auth.login');
});

Route::get('/error-404', function () {
    return view('pages.404');
})->name('errorPage');

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/home', function () {
    return view('home');
})->middleware(['Manager', 'verified'])->name('home');

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
    Route::middleware(['Manager'])->group(function () {
        // dd('-----------------');
        Route::prefix('buildings')->group(function () {
            Route::get('/index', [BuildingController::class, 'index'])->name('buildings.index');
            Route::get('/create', [BuildingController::class, 'create'])->name('buildings.create');
            
            // Route::get('/create', function () {
                
            //     return view('pages.building.create');
            // })->middleware(['auth', 'verified'])->name('buildings.create');
        });
    
        Route::prefix('floors')->group(function () {
            Route::get('/index', [FloorController::class, 'index'])->name('floors.index');
            Route::get('/create', [FloorController::class, 'create'])->name('floors.create');
        });
    
        Route::prefix('flats')->group(function () {
            Route::get('/index', [FlatController::class, 'index'])->name('flats.index');
            Route::get('/create', [FlatController::class, 'create'])->name('flats.create');
        });
        
    });
});



require __DIR__ . '/auth.php';
