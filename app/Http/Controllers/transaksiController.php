<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksis')
        ->get();
        return view('transaksi.index', compact('data'));
        
    }

}