<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class wellController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function pemasukan1()
    {
        $pemasukan1 = DB::table('pemasukans')
        ->whereDate('pemasukans.tgl', Carbon::today())
        ->get();
        
        $perhari = 0;
        foreach($pemasukan1 as $data){
            $perhari = $perhari + $data->nominal;
        }

        return response()->json([
            'pemasukan1' => $perhari
        ]);
    }
    public function pemasukan()
    {
        $pemasukan1 = DB::table('pemasukans')->get();

        $total = 0;
        foreach($pemasukan1 as $data){
            $total = $total + $data->nominal;
        }
       
        return response()->json([
            'pemasukan' => $total
        ]);
    }
    public function pengeluaran1()
    {
        $pengeluaran1 = DB::table('pengeluarans')
        ->whereDate('pengeluarans.tgl', Carbon::today())
        ->get();
        
        $perhari = 0;
        foreach($pengeluaran1 as $data){
            $perhari = $perhari + $data->nominal;
        }

        return response()->json([
            'pengeluaran1' => $perhari
        ]);
    }
    public function pengeluaran()
    {
        $pengeluaran1 = DB::table('pengeluarans')->get();

        $total = 0;
        foreach($pengeluaran1 as $data){
            $total = $total + $data->nominal;
        }
       
        return response()->json([
            'pengeluaran' => $total
        ]);
    }

}