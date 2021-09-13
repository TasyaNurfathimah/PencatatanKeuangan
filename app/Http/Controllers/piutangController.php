<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class piutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('piutangs')->get();
        return view('piutang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piutang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl1' => 'required',
            'piutang' => 'required',
            'ket1' => 'required'
        ], [
            'tgl1.required' => 'Tanggal Harus Diisi',
            'piutang.required' => 'Nominal Harus Diisi',
            'ket1.required' => 'Keterangan Harus Diisi'
        ]);
        DB::table('piutangs')->insert([
            'tgl1' => $request->tgl1,
            'piutang' => $request->piutang,
            'ket1' => $request->ket1
        ]);
        return redirect()->route('piutang.index')->with('success', 'Data Piutang Anda Berhasil Tersimpan ');
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
        $editPi = DB::table('piutangs')->where('id_piutang',$id)->first();
        return view('piutang.edit', compact('editPi'));
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
        $request->validate([
            'tgl1' => 'required',
            'piutang' => 'required',
            'ket1' => 'required'
        ], [
            'tgl1.required' => 'Tanggal Harus Diisi',
            'piutang.required' => 'Nominal Harus Diisi',
            'ket1.required' => 'Keterangan Harus Diisi'
        ]);
        DB::table('piutangs')->where('id_piutang',$id)->update([
            'tgl1' => $request->tgl1,
            'piutang' => $request->piutang,
            'ket1' => $request->ket1
        ]);
        return redirect()->route('piutang.index')->with('success', 'Data Piutang Anda Berhasil Terupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('piutangs')->where('id_piutang',$id)->delete();
        return redirect()->route('piutang.index')->with('success', 'Data Piutang Anda Berhasil Terhapus ');
    }
}
