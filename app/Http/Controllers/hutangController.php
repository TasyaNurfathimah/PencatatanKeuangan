<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class hutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('hutangs')->get();
        return view('hutang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hutang.create');
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
            'tgl' => 'required',
            'bayar' => 'required',
            'ket' => 'required'
        ], [
            'tgl.required' => 'Tanggal Harus Diisi',
            'bayar.required' => 'Nominal Harus Diisi',
            'ket.required' => 'Keterangan Harus Diisi'
        ]);
        DB::table('hutangs')->insert([
            'tgl' => $request->tgl,
            'bayar' => $request->bayar,
            'ket' => $request->ket
        ]);
        return redirect()->route('hutang.index')->with('success', 'Data Hutang Anda Berhasil Tersimpan ');
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
        $editH = DB::table('hutangs')->where('id_hutang',$id)->first();
        return view('hutang.edit', compact('editH'));
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
            'tgl' => 'required',
            'bayar' => 'required',
            'ket' => 'required'
        ], [
            'tgl.required' => 'Tanggal Harus Diisi',
            'bayar.required' => 'Nominal Harus Diisi',
            'ket.required' => 'Keterangan Harus Diisi'
        ]);
        DB::table('hutangs')->where('id_hutang',$id)->update([
            'tgl' => $request->tgl,
            'bayar' => $request->bayar,
            'ket' => $request->ket
        ]);
        return redirect()->route('hutang.index')->with('success', 'Data Hutang Anda Berhasil Terupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('hutangs')->where('id_hutang',$id)->delete();
        return redirect()->route('hutang.index')->with('success', 'Data Hutang Anda Berhasil Terhapus ');
    }
}
