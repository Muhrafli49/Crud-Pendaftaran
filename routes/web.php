<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return view('home');
});

Route::get('/pendaftaran', [PendaftarController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftarController::class, 'store'])->name('pendaftaran.store');

// (API Wilayah)
Route::get('/api/provinsi', [PendaftarController::class, 'getProvinsi']);
Route::get('/api/kabupaten/{id}', [PendaftarController::class, 'getKabupaten']);
