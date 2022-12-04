<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register()
    {
        $leaderlist= User::where("role",1)->orderBy('name','asc')->get();
        return view('register',compact('leaderlist'));
    }
    
    public function actionregister(Request $request)
    {
        $jabatan=($request->role == 1) ? "Atasan" : "Pegawai";
        if($request->role == 1 && $request->atasan == null){
            $request->atasan = 0;
        }
        try {
            if($request->role == 2 && $request->atasan == 0){
                throw ValidationException::withMessages(['atasan' => 'atasan tidak boleh kosong']);
            }
        }
        catch (ValidationException $e) {
            abort(400, "atasan tidak boleh kosong");
        }
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'nip' => $request->nip,
            'jabatan'=>$jabatan,
            'perangkat_daerah'=>$request ->perangkat_daerah,
            'atasan' =>$request->atasan,
            'role' => $request->role,
            'password' => Hash::make($request->password)
            
        ]);

        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}
