<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kategoris')->get();
        return view('kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama_kat' => 'required'
        ], [
            'nama_kat.required' => 'Nama Kategori Harus Diisi'
        ]);
         DB::table('kategoris')->insert([
            'nama_kat' => $request->nama_kat2
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Tersimpan ');
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
        $editKat = DB::table('kategoris')->where('id_kat',$id)->first();
        return view('kategori.edit', compact('editKat'));
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
            'nama_kat' => 'required'
        ], [
            'nama_kat.required' => 'Nama Kategori Harus Diisi'
        ]);
         DB::table('kategoris')->where('id_kat',$id)->update([
            'nama_kat' => $request->nama_kat2
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Terupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategoris')->where('id_kat',$id)->delete();
         return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Terhapus ');
    }
}
