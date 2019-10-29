<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\Balai;
use App\Satker;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $data_rekap = DB::table('wilayah')
            ->join('balai','wilayah.id','=','balai.wilayah_id')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->join('paket7','paket.id','=','paket7.id')
            ->select('wilayah.*','balai.*','satker.*','paket.*','paket7.*')
            //->groupBy('balai.id','balai.nmbalai')
            //->groupBy('balai.id','balai.nmbalai')
            ->get();
        //dd($data_rekap);
        return view('home', compact('data_rekap'));
    }
    
}
