<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'viewHome'])->name('home.index');
Route::get('/konfigurasi', [BerandaController::class, 'viewKonfigurasi'])->name('konfigurasi.index');

Route::prefix('keanggotaan')->group(function () {
    Route::get('/daftar-anggota', [BerandaController::class, 'viewDaftarAnggota'])->name('keanggotaan.daftar');
    Route::get('/tipe-anggota', [BerandaController::class, 'viewTipeAnggota'])->name('keanggotaan.tipe');
    Route::get('/surat-bebas-perpus', [BerandaController::class, 'viewSuratBebasPerpustakaan'])->name('keanggotaan.surat_bebas');
});

Route::prefix('tabel-data')->group(function () {
    Route::get('/hari-libur', [BerandaController::class, 'viewHariLibur'])->name('tabel.hari_libur');
    Route::get('/jenis-item', [BerandaController::class, 'viewJenisItem'])->name('tabel.jenis_item');
    Route::get('/penerbit', [BerandaController::class, 'viewPenerbit'])->name('tabel.penerbit');
    Route::get('/penulis', [BerandaController::class, 'viewPenulis'])->name('tabel.penulis');
    Route::get('/supplier', [BerandaController::class, 'viewSupplier'])->name('tabel.supplier');
    Route::get('/topik', [BerandaController::class, 'viewTopik'])->name('tabel.topik');
    Route::get('/lokasi', [BerandaController::class, 'viewLokasi'])->name('tabel.lokasi');
    Route::get('/rak', [BerandaController::class, 'viewRak'])->name('tabel.rak');
    Route::get('/tempat-penerbit', [BerandaController::class, 'viewTempatPenerbit'])->name('tabel.tempat_penerbit');
    Route::get('/status-item', [BerandaController::class, 'viewStatusItem'])->name('tabel.status_item');
    Route::get('/tipe-koleksi', [BerandaController::class, 'viewTipeKoleksi'])->name('tabel.tipe_koleksi');
    Route::get('/frekuensi', [BerandaController::class, 'viewFrekuensi'])->name('tabel.frekuensi');
    Route::get('/bahasa', [BerandaController::class, 'viewBahasa'])->name('tabel.bahasa');
    Route::get('/tujuan-bebas-perpus', [BerandaController::class, 'viewTujuanBebasPerpus'])->name('tabel.tujuan_bebas');
});
