<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $data['sekolah'] = Sekolah::all();
        return view('sekolah.index', $data);
    }

    public function store(Request $request)
    {
        Sekolah::create([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Sekolah::find($request->id)->update([
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }
}
