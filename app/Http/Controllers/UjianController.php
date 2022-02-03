<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $data['ujian'] = Ujian::all();
        return view('sekolah.index', $data);
    }

    public function store(Request $request)
    {
        Ujian::create([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Ujian::find($request->id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }
}
