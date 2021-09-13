<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pengeluarans')->get();
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('pengeluarans')->get();
        $cek = 0;
        $total = count($data);

        foreach($data as $a){
            $cek++;
            if($cek == $total){
                $id = $a->id_keluar;
            }
        }
        return view('pengeluaran.create', compact('id'));
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
            'nominal.required' => 'Pengeluaran Harus Diisi'
        ]);
        DB::table('pengeluarans')->insert([
            'tgl' => $request->tgl,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal
        ]);
        $id_akhir = $request->id_keluar;
        $id_akhir++;
        DB::table('transaksis')->insert([
            'id_masuk_fk' => 0,
            'id_keluar_fk' => $id_akhir,
            'tanggal_trans' => $request->tgl,
            'uraian' => $request->uraian,
            'pemasukan' => 0,
            'pengeluaran' => $request->nominal
        ]);
        return redirect()->route('pengeluaran.index')->with('success', 'Data Pengeluaran Anda Berhasil Tersimpan ');
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
        $editKeluar = DB::table('pengeluarans')->where('id_keluar',$id)->first();
        return view('pengeluaran.edit', compact('editKeluar'));
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
            'nominal.required' => 'pengeluaran Harus Diisi'
        ]);
        DB::table('pengeluarans')->where('id_keluar',$id)->update([
            'tgl' => $request->tgl,
            'uraian' => $request->uraian,
            'nominal' => $request->nominal
        ]);
        DB::table('transaksis')->where('id_keluar_fk',$id)->update([
            'tanggal_trans' => $request->tgl,
            'uraian' => $request->uraian,
            'pengeluaran' => $request->nominal
        ]);
        return redirect()->route('pengeluaran.index')->with('success', 'Data Pengeluaran Anda Berhasil Terupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pengeluarans')->where('id_keluar',$id)->delete();
        DB::table('transaksis')->where('id_keluar_fk',$id)->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data Pengeluaran Anda Berhasil Terhapus ');
    }
}
