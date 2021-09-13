<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pemasukans')->get();
        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('pemasukans')->get();
        $cek = 0;
        $total = count($data);

        foreach($data as $a){
            $cek++;
            if($cek == $total){
                $id = $a->id_masuk;
            }
        }

        return view('pemasukan.create', compact('id'));
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
            'uraian' => 'required',
            'nominal' => 'required'
        ], [
            'tgl.required' => 'Tanggal Harus Diisi',
            'uraian.required' => 'Silahkan Isi Uraian',
            'nominal.required' => 'Pemasukan Harus Diisi'
        ]);
        DB::table('pemasukans')->insert([
            'tgl' => $request->tgl,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal
        ]);
        $id_akhir = $request->id_masuk;
        $id_akhir++;
        DB::table('transaksis')->insert([
            'id_masuk_fk' => $id_akhir,
            'id_keluar_fk' => 0,
            'tanggal_trans' => $request->tgl,
            'uraian' => $request->uraian,
            'pemasukan' => $request->nominal,
            'pengeluaran' => 0
        ]);
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan Anda Berhasil Tersimpan ');
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
        $editMasuk = DB::table('pemasukans')->where('id_masuk',$id)->first();
        return view('pemasukan.edit', compact('editMasuk'));
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
            'uraian' => 'required',
            'nominal' => 'required'
        ], [
            'tgl.required' => 'Tanggal Harus Diisi',
            'uraian.required' => 'Silahkan Isi Uraian',
            'nominal.required' => 'Pemasukan Harus Diisi'
        ]);
        DB::table('pemasukans')->where('id_masuk',$id)->update([
            'tgl' => $request->tgl,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal
        ]);
        DB::table('transaksis')->where('id_masuk_fk',$id)->update([
            'tanggal_trans' => $request->tgl,
            'uraian' => $request->uraian,
            'pemasukan' => $request->nominal
        ]);
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan Anda Berhasil Terupdate ');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pemasukans')->where('id_masuk',$id)->delete();
        DB::table('transaksis')->where('id_masuk_fk',$id)->delete();
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan Anda Berhasil Terhapus ');
    }
}
