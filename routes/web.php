<?php

use App\Http\Controllers\Admin\EntrepriseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\VilleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/create-entreprise',[EntrepriseController::class,'create'])->name('admin.createEntreprise');
    Route::post('/admin/create-entreprise',[EntrepriseController::class,'store'])->name('admin.createEntreprise');
    Route::get('/admin/liste-entreprise',[EntrepriseController::class,'liste'])->name('admin.ListeEntreprise');
    Route::post('/admin/show-entreprise',[EntrepriseController::class,'show'])->name('admin.showEntreprise');

    Route::get('/get-villes-by-pays/{pays}', [VilleController::class, 'getVilles'])->name('villes.par.pays');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
