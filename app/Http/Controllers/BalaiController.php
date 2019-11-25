<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balai;
use App\Wilayah;
use App\Satker;
use App\Paket;
use App\Tblkdoutput;
use App\Tblabat;
use App\Tblabjiat;
use App\Tblrehabbangun;
use DB;
use PDF;

class BalaiController extends Controller
{
    public function balai($id)
    {
        $wilayah = Wilayah::with('balai', 'satker', 'paket')->find($id);

        //$balai=$wilayah->get
        $data_rekap = DB::table('wilayah')
            ->join('balai', 'wilayah.id', '=', 'balai.wilayah_id')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->select('wilayah.*', 'balai.*', 'paket.*')
            ->where('wilayah_id', $id)
            ->get();

        //dd($wilayah);
        //dd($data_rekap);
        return view('balai.index', compact('wilayah', 'data_rekap'));
    }

    public function show($id)
    {
        $balai = Balai::find($id);
        $satker = Balai::with('satker', 'paket', 'wilayah')->find($id);
        $wilayah = $satker->wilayah;
        $tblkdoutput2 = DB::table('tblkdoutput2')
            ->groupBy('nmabat')
            ->get();
        //$percent=Paket::select('')
        $data_rekap = DB::table('balai')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->select('wilayah.*', 'balai.*', 'paket.*', 'tblkdoutput.*')
            ->select('balai.*', 'paket.*', 'tblkdoutput.*')
            ->where('balai.id', $id)
            ->get();

        //dd($wilayah);
        //dd($data_rekap);
        return view('balai.show', compact('wilayah', 'balai', 'satker', 'data_rekap', 'tblkdoutput2'));
    }

    public function showoutput($id, $kdoutput)
    {
        $balai = Balai::find($id);
        $satker = Balai::with('satker', 'paket', 'wilayah')->find($id);
        $wilayah = $satker->wilayah;
        //$percent=Paket::select('')
        $data_rekap = DB::table('balai')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->select('wilayah.*', 'balai.*', 'paket.*', 'tblkdoutput.*')
            ->select('balai.*', 'paket.*', 'tblkdoutput.*')
            ->where('balai.id', $id)
            ->orWhere('kdoutput', $kdoutput)
            ->get();
        $kdoutput = Tblkdoutput::all();
        //dd($wilayah);
        //dd($data_rekap);
        return view('balai.show', compact('wilayah', 'balai', 'satker', 'data_rekap', 'kdoutput'));
    }

    public function kdoutput(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('tblkdoutput2')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }




    public function cetak_pdf($id)
    {
        $balai = Balai::find($id);
        $satker = Balai::with('satker', 'paket')->find($id);
        $data_rekap = DB::table('balai')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->select('wilayah.*', 'balai.*', 'paket.*', 'tblkdoutput.*')
            ->select('balai.*', 'paket.*', 'tblkdoutput.*')
            ->where('balai.id', $id)
            ->get();

        $pdf = PDF::loadview('/balai/paket_balai_pdf', ['balai' => $balai, 'satker' => $satker, 'data_rekap' => $data_rekap])->setPaper('a4', 'landscape');
        //dd($pdf);
        return $pdf->stream();
    }
    public function cetak_pdf2($id)
    {
        $balai = Balai::find($id);
        $satker = Balai::with('satker', 'paket')->find($id);
        $data_rekap = DB::table('balai')
            ->join('satker', 'balai.id', '=', 'satker.balai_id')
            ->join('paket', 'satker.kdsatker', '=', 'paket.kdsatker')
            ->join('tblkdoutput', 'paket.kdoutput', '=', 'tblkdoutput.kdoutput')
            ->select('wilayah.*', 'balai.*', 'paket.*', 'tblkdoutput.*')
            ->select('balai.*', 'paket.*', 'tblkdoutput.*')
            ->where('balai.id', $id)
            ->get();

        //dd($satker);
        $pdf = PDF::loadview('/balai/paket_balai_pdf2', ['balai' => $balai, 'satker' => $satker, 'data_rekap' => $data_rekap])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
