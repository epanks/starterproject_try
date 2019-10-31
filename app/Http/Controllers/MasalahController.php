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

        return redirect()->route('paket.show',$id)->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $masalah_paket=Masalah::find($id);     
        //dd($masalah_paket);  
        return view('masalah/edit', compact('masalah_paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'progres_fisik' => 'numeric|between:0,100'
        ]);
        $data_paket = Paket::find($id);
        $data_paket->update($request->all());
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }


    public function delete($id)
    {
        $data_paket = Masalah::find($id);
        $data_paket->delete($data_paket);
        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }
}
