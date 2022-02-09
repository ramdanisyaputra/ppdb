<?php

namespace App\Http\Controllers;

use App\Models\Pernyataan;
use App\Models\Peserta;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PernyataanController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPeserta');
    }

    public function index()
    {
        $data['profil'] = Profil::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
        if($data['profil'] == null){
            return redirect()->back();
        }
        $data['pernyataan'] = Pernyataan::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
        return view('pernyataan.index' ,$data);
    }

    public function store(Request $request)
    {
        if($request->nama == null){
            return redirect()->back()->with('error', 'Nama masih kosong, silahkan isi terlebih dahulu');
        }
        $image = $request->foto;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = \Illuminate\Support\Str::random(10).'.'.'png';

        \File::put(public_path(). '/images/signature/' . $imageName, base64_decode($image));

        Pernyataan::create([
            'peserta_id' => auth()->guard(session()->get('role'))->user()->id,
            'nama' => $request->nama,
            'foto' => $imageName
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
