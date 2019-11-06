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
        $balai=Balai::get();
        $satker=Satker::get();
        $data_rekap = DB::table('wilayah')
            ->join('balai','wilayah.id','=','balai.wilayah_id')
            ->join('satker','balai.id','=','satker.balai_id')
            ->join('paket','satker.kdsatker','=','paket.kdsatker')
            ->select('wilayah.*','balai.*','satker.*','paket.*')
            //->groupBy('balai.id','balai.nmbalai')
            //->groupBy('balai.id','balai.nmbalai')
            ->get();
        //dd($balai);
        return view('home', compact('data_rekap','balai','satker'));
    }
    
}
