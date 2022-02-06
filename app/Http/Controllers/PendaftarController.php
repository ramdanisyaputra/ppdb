<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Profil;

class PendaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole');
    }
    
    public function index()
    {
        if(session()->get('role') == 'panitia'){
            $data['peserta'] = Peserta::whereHas('profil',function ($query) {
                $query->where('sekolah_id', auth()->guard(session()->get('role'))->user()->sekolah_id);
            })->with('nilaiTes')->get();
        }else{
            $data['peserta'] = Peserta::all();
        }
        return view('pendaftar.index', $data);
    }

    public function detail($peserta)
    {
        $data['profil'] = Profil::where('peserta_id', $peserta)->first();
        return view('pendaftar.detail', $data);
    }

    public function detailProfil($profil)
    {
        $data['profil'] = Profil::where('id', $profil)->first();
        return view('pendaftar.detail_profil', $data);
    }

    public function detailDinas($peserta)
    {
        $data['profil'] = Profil::where('peserta_id', $peserta)->count();
        return view('pendaftar.profil', $data);
    }
}
