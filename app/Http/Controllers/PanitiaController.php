<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        $data['panitia'] = Panitia::all();
        $data['sekolah'] = Sekolah::all();
        return view('panitia.index', $data);
    }

    public function store(Request $request)
    {
        Panitia::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'sekolah_id' => $request->sekolah_id
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Panitia::find($request->id)->update([
            'nama' => $request->nama,
            'sekolah_id' => $request->sekolah_id
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        Panitia::find($id)->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
