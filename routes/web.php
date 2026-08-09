<?php

use App\Http\Controllers\LugarTuristicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LugarTuristicoController::class, 'index'])->name('lugares.index');
Route::get('/lugares/{slug}', [LugarTuristicoController::class, 'show'])->name('lugares.show');
Route::post('/lugares/{slug}/contacto', [LugarTuristicoController::class, 'contact'])->name('lugares.contact');
