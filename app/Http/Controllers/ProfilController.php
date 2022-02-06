<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPeserta');
    }
    
    public function index()
    {
        $data['sekolah'] = Sekolah::all();
        $data['profil'] = Profil::where('id', auth()->guard(session()->get('role'))->user()->id)->first();
        return view('profil.index', $data);
    }

    public function store(Request $request)
    {
        Profil::create([
            'peserta_id' => auth()->guard(session()->get('role'))->user()->id,
            'panggilan' => $request->panggilan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ttl' => $request->ttl,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_telp_ayah' => $request->no_telp_ayah,
            'no_telp_ibu' => $request->no_telp_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat,
            'sekolah_id' => $request->sekolah_id
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Profil::find($request->id)->update([
            'panggilan' => $request->panggilan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ttl' => $request->ttl,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_telp_ayah' => $request->no_telp_ayah,
            'no_telp_ibu' => $request->no_telp_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat' => $request->alamat,
            'sekolah_id' => $request->sekolah_id
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }
}
