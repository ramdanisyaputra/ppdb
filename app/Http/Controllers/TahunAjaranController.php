<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }

    public function index()
    {
        $data['tahun_ajaran'] = TahunAjaran::all();
        return view('tahun_ajaran.index', $data);
    }

    public function store(Request $request)
    {
        TahunAjaran::create([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        TahunAjaran::find($request->id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }
}
