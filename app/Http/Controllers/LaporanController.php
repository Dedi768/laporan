<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;
use DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public static $month_list= array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()->role == 1){
            $laporan = Laporan::where('atasan',Auth::user()->id)->orderBy('tanggal', 'desc')->get();
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
        $atasan=User::where('id',Auth::user()->atasan)->first();
        $printtanggal = Laporan::whereRaw("nip= ? AND tanggal >= ? AND tanggal <= ? ",[Auth::user()->nip,$tglawal ,$tglakhir])->orderBy('tanggal','asc')->get();
        

        //status= 'divalidasi' AND 
        $period = LaporanController::getCurrentPeriod(); 
        return view('laporan.print_pertanggal',compact('printtanggal','period','atasan'));
        
   }    

    public function getCurrentPeriod()
    {
        $month = date('m');
        $year = date ('Y');
        return LaporanController::$month_list[$month].'/'.$year;
        
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
        $laporan->atasan=Auth::user()->atasan;
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
