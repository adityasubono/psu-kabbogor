<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->with('wellcome','Selamat Datang DI Sistem Informasi Prasana
        Sarana dan Utilitas Kabupaten Bogor');
    }

    public function about()
    {
        return view('about', ['nama' => 'Aditya About :)']);
    }
}
