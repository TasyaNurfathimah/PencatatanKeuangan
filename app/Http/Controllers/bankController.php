<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class bankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('banks')->get();
        return view('bank.index', compact('data'));
    }

    public function total()
    {
        $total = DB::table('banks')
        ->join('transaksis', 'transaksis.bank_trans', 'banks.id_bank')
        ->select('banks.*', 'transaksis.*')
        ->whereDate()    
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('banks')->insert([
            'nama_bank' => $request->nama_bank,
            'pemilik' => $request->pemilik,
            'norek' => $request->norek,
            'saldo' => $request->saldo
        ]);
        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editBank = DB::table('banks')->where('id_bank',$id)->first();
        return view('bank.edit', compact('editBank'));
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
        DB::table('banks')->where('id_bank',$id)->update([
            'nama_bank' => $request->nama_bank,
            'pemilik' => $request->pemilik,
            'norek' => $request->norek,
            'saldo' => $request->saldo
        ]);

        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
