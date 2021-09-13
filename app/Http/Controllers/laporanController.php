<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksis')->get();
        return view('laporan.index', compact('data'));
    }
    public function pdf()
    {
        $data = DB::table('transaksis')->get();
        return view('pdf', compact('data'));
        
        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->download('Laporan.pdf'); 
        
    }
    public function cetak($tgl_awal, $tgl_akhir)
    {
        // dd(["Tanggal A : ".$tgl_awal, "TAnggal Ak : ".$tgl_akhir]);
        $datapertgl = DB::table('transaksis')->whereBetween('tanggal_trans',[$tgl_awal, $tgl_akhir])->get();
        return view('tanggalpdf', compact('datapertgl'));
    }
}
