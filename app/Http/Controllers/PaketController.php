<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balai;
use App\Wilayah;
use App\Satker;
use App\Paket;
use App\Masalah;
use DB;

class PaketController extends Controller
{
    public function show($id)
    {
        
        $paket=Paket::with('masalah')->find($id);
        
        //dd($masalah);
        //dd($data_rekap1);
        return view('paket.show', compact('paket'));
    }
}
