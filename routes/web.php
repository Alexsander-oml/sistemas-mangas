<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/mangas');
Route::get('/mangas', [MangaController::class, 'index'])->name('mangas.index');
Route::get('/mangas/create', [MangaController::class, 'create'])->name('mangas.create');
Route::post('/mangas', [MangaController::class, 'store'])->name('mangas.store');
Route::delete('/mangas/{id}', [MangaController::class, 'destroy'])->name('mangas.destroy');
