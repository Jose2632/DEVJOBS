<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth','verified', 'rol.reclutador'])->name('vacantes.index');

Route::get('/vacantes/create', [VacanteController::class, 'create'])->middleware(['auth','verified'])->name('vacantes.create');

Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth','verified'])->name('vacantes.edit');

Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}', [CandidatosController::class, 'index'])->middleware(['auth','verified', 'rol.reclutador'])->name('candidatos.index');

Route::get('/notificaciones', NotificacionController::class)->middleware(['auth','verified', 'rol.reclutador'])->name('notificaciones');

require __DIR__.'/auth.php';