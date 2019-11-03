<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balai;
use App\Wilayah;
use App\Satker;
use App\Paket;
use App\Tblsatoutput;
use App\Tblkdoutput;
use App\Masalah;
use DB;

class PaketController extends Controller
{
    public function show($id)
    {
        
        $paket=Paket::with('masalah','tblsatoutput')->find($id);
        
        
        //dd($masalah);
        //dd($paket);
        return view('paket.show', compact('paket'));
    }

    public function create($id)
    {
        $dtsatker1=Balai::find($id);
        $dtsatker=$dtsatker1->satker;
        $dtsatoutput=Tblsatoutput::get();
        $dtkdoutput=Tblkdoutput::get(); 
        //dd($dtsatker1);
        return view('paket.create',compact('dtsatker','dtsatker1','dtsatoutput','dtkdoutput'));
    }

    public function store(Request $request, $id)
    {

        // $insert_paket= new Paket;
        // $insert_paket->kdsatker = request('kdsatker');
        // $insert_paket->nmpaket = request('nmpaket');
        // $insert_paket->trgoutput = request('trgoutput');
        // $insert_paket->kdsatker = request('kdsatker');
        // $insert_paket->satoutput = request('satoutput');
        // $insert_paket->trgoutcome = request('trgoutcome');
        // $insert_paket->satoutcome = request('satoutcome');
        // $insert_paket->kdoutput = request('kdoutput');
        // $insert_paket->pagurmp = request('pagurmp');
        // $insert_paket->pagurmawal = request('pagurmawal');
        // $insert_paket->keuangan = request('keuangan');
        // $insert_paket->progres_fisik = request('progres_fisik');
        // $insert_paket->TahunFisik = request('TahunFisik');
        // $insert_paket->save();

        
        // return redirect ('/balai')->with('sukses', 'Data berhasil diinput');
        Paket::create($request->all());

        return redirect()->route('balai.show',$id)->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $data_paket=Paket::find($id);
        $dtsatoutput=Tblsatoutput::get();
        $dtkdoutput=Tblkdoutput::get();  
        $dtsatker=Satker::get();     
        //dd($data_paket);  
        return view('paket/edit', compact('data_paket','dtsatoutput','dtsatker','dtkdoutput'));
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
        $data_paket = Paket::find($id);
        $data_paket->delete($data_paket);
        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }

}
