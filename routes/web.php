<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('welcome');
});

// list semwa jadwal
Route::get('/jadwals', [JadwalController::class, 'index'])->name('jadwals.index');

// form untuk mengcreate jadwal
Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwals.create');

// logika menyimpan jadwal
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwals.store');

// salah satu detail jadwal
Route::get('/jadwal/{id}/detail', [JadwalController::class, 'show'])->name('jadwals.show');

// form untuk mengdit jadwal
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwals.edit');

// logika update jadwal
Route::put('/jadwal/{id}/update', [JadwalController::class, 'update'])->name('jadwals.update');

// hapus jadwal
Route::delete('/jadwal/{id}/delete', [JadwalController::class, 'destroy'])->name('jadwals.destroy');
