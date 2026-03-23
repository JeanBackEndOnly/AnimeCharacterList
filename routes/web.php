<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CharacterManagementController;
use App\Http\Controllers\Admin\CharacterProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (){
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('management', [CharacterManagementController::class, 'index'])->name('management');
        Route::post('management', [CharacterManagementController::class, 'store'])->name('store.character');
        Route::get('profile/{id}', [CharacterManagementController::class, 'show'])->name('show.character');
        Route::put('updateProfile/{id}', [CharacterProfileController::class, 'update'])->name('update.character');
        Route::get('updateProfile/{id}', [CharacterProfileController::class, 'show'])->name('show.character.update');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
