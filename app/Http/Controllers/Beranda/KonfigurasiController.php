<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    public function index()
    {
        return view('Beranda.konfigurasi');
    }
}
