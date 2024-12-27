<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda.index');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{profil:nim}', [ProfilController::class, 'show'])->name('profil.show');