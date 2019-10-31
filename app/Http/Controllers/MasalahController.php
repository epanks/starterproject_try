<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masalah;
use App\Paket;

class MasalahController extends Controller
{
    public function create($id)
    {
        $dtmasalah=Paket::with('masalah')->find($id);
        //$dtsatker=$dtsatker1->satker;
        //dd($dtmasalah);
        return view('masalah.create',compact('dtmasalah'));
    }

    public function store(Request $request, $id)
    {
        Masalah::create($request->all());
        $request->paket_id=$id;

        

        return redirect()->route('paket.show',$id)->with('sukses', 'Data berhasil diinput');
    }
}
