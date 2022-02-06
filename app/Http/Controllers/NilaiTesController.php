<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\Peserta;
use App\Models\Sekolah;
use App\Models\SoalTes;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NilaiTesController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole');
    }
    
    public function index()
    {
        if(session()->get('role') == 'panitia'){
            $data['tes'] = Tes::where('sekolah_id', auth()->guard(session()->get('role'))->user()->sekolah_id)->get();

        }else{
            $data['tes'] = Tes::all();
        }
        return view('nilai-tes.index', $data);
    }

    public function indexNilai($id)
    {
        $data['tes'] = Tes::find($id);
        $tes = $data['tes'];
        $data['peserta'] = Peserta::whereHas('profil',function ($query) use ($tes) {
                                $query->where('sekolah_id', $tes->sekolah_id);
                            })->with('nilaiTes')->get();

        return view('nilai-tes.detail', $data);
    }

    public function detailPengerjaan($tes, $nilai)
    {
        $data['tes'] = Tes::find($tes);
        $data['nilaiTes'] = NilaiTes::find($nilai);

        return view('nilai-tes.detail_pengerjaan', $data);
    }

    public function nilaiDelete($nilai)
    {
        NilaiTes::find($nilai)->delete();
        return redirect()->back()->with('success','Nilai berhasil di Hapus');
    }

}
