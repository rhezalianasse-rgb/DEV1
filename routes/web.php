<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\MedcineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin/utilisateurs', [AdminUserController::class, 'index'])
        ->middleware('admin')
        ->name('admin.users.index');

    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/auteurs', [AuteurController::class, 'index'])->name('auteurs.index');
    Route::get('/auteurs/create', [AuteurController::class, 'create'])->name('auteurs.create');
    Route::post('/auteurs', [AuteurController::class, 'store'])->name('auteurs.store');
    Route::get('/auteurs/{id}', [AuteurController::class, 'show'])->name('auteurs.show');
    Route::get('/auteurs/{id}/edit', [AuteurController::class, 'edit'])->name('auteurs.edit');
    Route::put('/auteurs/{id}', [AuteurController::class, 'update'])->name('auteurs.update');
    Route::delete('/auteurs/{id}', [AuteurController::class, 'destroy'])->name('auteurs.destroy');

    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/livres/{id}', [LivreController::class, 'show'])->name('livres.show');
    Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::put('/livres/{id}', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');

    Route::resource('medecins', MedcineController::class);
    Route::resource('patients', PatientController::class);
});
