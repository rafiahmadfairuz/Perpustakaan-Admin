<?php

use App\Http\Controllers\Beranda\HomeController;
use App\Http\Controllers\Beranda\KonfigurasiController;
use App\Http\Controllers\Beranda\TabelDataController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/konfigurasi', [KonfigurasiController::class, "index"])->name('konfigurasi.index');
