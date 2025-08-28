<?php

use App\Http\Controllers\Beranda\HomeController;
use App\Http\Controllers\Beranda\TabelDataController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
