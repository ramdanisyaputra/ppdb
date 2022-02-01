<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required|max:255',
            'username' => 'required|max:255|unique:peserta',
            'password' => 'required',
            'no_telp' => 'required',
        ]);

        Peserta::create([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'no_telp'   => $request->no_telp
        ]);

        return redirect()->route('loginForm')->with('success','Anda Berhasil Daftar, Silahkan Masuk');

    }
}
