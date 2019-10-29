<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balai;
use App\Wilayah;
use App\Satker;
use App\Paket;
use DB;

class BalaiController extends Controller
{
    public function balai($id)
    {
        $wilayah=Wilayah::with('balai','satker')->find($id);
        //$balai=$wilayah->get
        $data_rekap = DB::table('wilayah')
            ->join('balai','wilayah.id','=','balai.wilayah_id')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->select('wilayah.*','balai.*','paket.*')
            ->where('wilayah_id',$id)
            ->get();

        $data_rekap1 = DB::table('wilayah')
            ->join('balai','wilayah.id','=','balai.wilayah_id')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->select('wilayah.*','balai.*','paket.*')
            ->where('wilayah_id',$id)
            ->groupBy('nmbalai')
            ->orderBy('balai.id','asc')
            ->get();
        //dd($wilayah);
        //dd($data_rekap1);
        return view('balai.index', compact('wilayah','balai','satker','data_rekap','data_rekap1'));
    }

    public function show($id)
    {
        $balai=Balai::with('satker','paket')->find($id);
        $data_rekap = DB::table('balai')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->select('balai.*','paket.*')
            ->where('balai.id',$id)
            ->get();

        $data_rekap1 = DB::table('wilayah')
            ->join('balai','wilayah.id','=','balai.wilayah_id')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->select('wilayah.*','balai.*','paket.*')
            ->where('wilayah_id',$id)
            ->groupBy('nmbalai')
            ->orderBy('balai.id','asc')
            ->first();
        //dd($balai);
        //dd($data_rekap);
        return view('balai.show', compact('balai','satker','data_rekap','data_rekap1'));
    }
}
