<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

/* Rutas con autenticacion */
Route::middleware(['auth', 'verified'])->group(function () {
    /* Vacantes */
    Route::get('/dashboard' , [VacanteController::class , 'index'])->middleware('rol.reclutador')->name('vacante.index');
    Route::get('/vacantes/create' , [VacanteController::class , 'create'])->name('vacante.create');
    Route::get('/vacantes/{vacante}/edit' , [VacanteController::class , 'edit'])->name('vacante.edit');
    Route::get('/candidatos/{vacante}' , [CandidatoController::class , 'index'])->name('candidatos.index');
});

Route::get('/notificaciones' , NotificacionController::class)->middleware(['rol.reclutador','auth', 'verified'])->name('notifiacaiones');
Route::get('/vacantes/{vacante}' , [VacanteController::class , 'show'])->name('vacante.show');
/* Adjunta las rutas */
require __DIR__ . '/auth.php';
