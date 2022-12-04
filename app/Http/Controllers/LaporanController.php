<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()->role == 1){
            $laporan = Laporan::orderBy('tanggal', 'desc')->get();
        }else{
            $laporan = Laporan::where('nip',Auth::user()->nip)->orderBy('tanggal', 'desc')->get();
        }

        return view('laporan.tampil_laporan',compact('laporan'));
        
        
    }

    public function print()
    {
        $laporan = Laporan::orderBy('created_at', 'desc')->get();
        return view('laporan.print',compact('laporan'));
    }

    public function printform()
    {   
        if (Auth::user()->role == 1){
            return redirect('/laporan');;
        }

        return view('laporan.print_form');
    }

   public function printpertanggal($tglawal, $tglakhir)
   {
        if (Auth::user()->role == 1){
            return redirect('/laporan');;
        }
        $printtanggal = Laporan::whereRaw("status= 'divalidasi' AND nip= ? AND tanggal >= ? AND tanggal <= ? ",[Auth::user()->nip,$tglawal ,$tglakhir])->orderBy('tanggal','asc')->get();
        $allSessions = session()->all();

        
        return view('laporan.print_pertanggal',compact('printtanggal'));
        
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
        $laporan->nama=Auth::user()->name;
        $laporan->nip=Auth::user()->nip;
        $laporan->jabatan=Auth::user()->jabatan;
        $laporan->kegiatan=$request->input('kegiatan');
        $laporan->tanggal=$request->input('tanggal');
        $laporan->tanggal= date("Y-m-d", strtotime($laporan->tanggal));
        
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
            'kegiatan' => $request->kegiatan,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal))
            
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
