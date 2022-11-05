<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::orderBy('created_at', 'desc')->get();
        return view('laporan.tampil_laporan',compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.tambah_laporan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(Request $request)
    {   
        $laporan = new Laporan ;
        $laporan->nama=$request->input('nama');
        $laporan->nip=$request->input('nip');
        $laporan->jabatan=$request->input('jabatan');
        $laporan->kegiatan=$request->input('kegiatan');
        $laporan->tanggal=$request->input('tanggal');
        $laporan->status='belum divalidasi';
        $laporan->save();

      

        return redirect()->route('laporan'); 
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
        $laporan =Laporan::find($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function showValidation($id)
    {
        $laporan =Laporan::find($id);
        return view('laporan.validation', compact('laporan'));

    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Laporan::where('id', $request->id)
        ->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal
        ]);
        
        return redirect()->route('laporan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laporan::where('id',$id)->delete();

        return redirect()->route('laporan');
    }
}
