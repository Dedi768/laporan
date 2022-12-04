<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {
        $jabatan=($request->role == 1) ? "Atasan" : "Pegawai";
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'nip' => $request->nip,
            'jabatan'=>$jabatan,
            'role' => $request->role,
            'password' => Hash::make($request->password)
            
        ]);

        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}
