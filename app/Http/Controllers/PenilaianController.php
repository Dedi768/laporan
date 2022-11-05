<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function validasi(Request $request)
    {   
        $penilaian = new Penilaian;
        $penilaian->id_laporan=$request->input('id_laporan');
        $penilaian->disiplin_waktu=$request->input('disiplin_waktu');
        $penilaian->kerjasama=$request->input('kerjasama');
        $penilaian->save();

        Laporan::where('id', $request->id_laporan)
        ->update([
            'status' => "divalidasi"
            
        ]);

        return redirect()->route('laporan'); 
    }

}
