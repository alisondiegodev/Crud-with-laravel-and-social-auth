<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;



Route::get('/', [CustomerController::class, 'index']);
Route::get('/dashboard', [CustomerController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store']);
    Route::get('/edit/{id}', [CustomerController::class, 'edit']);
    Route::put('/update/{id}', [CustomerController::class, 'update']);
    Route::delete('/delete/{id}', [CustomerController::class, 'destroy']);
});


Route::get('/auth/redirect', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/callback', [SocialiteController::class, 'handleProviderCallback']);

require __DIR__ . '/auth.php';
