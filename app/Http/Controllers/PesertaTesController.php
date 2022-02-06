<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\Profil;
use App\Models\Tes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesertaTesController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPeserta');
    }

    public function index()
    {
        $profil = Profil::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
        if($profil == null){
            return redirect()->route('home')->with('error', 'Silahkan lengkapi profil anda terlebih dahulu');
        }
        $data['tes'] = Tes::where('sekolah_id', $profil->sekolah_id)->where('status', "1")->get();

        return view('peserta-tes.index', $data);
    }

    public function boarding($tes)
    {
        $data['tes'] = Tes::find($tes);
        $profil = Profil::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
        $is_nilai_exists = NilaiTes::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)
                                        ->where('tes_id', $data['tes']->id)
                                        ->first();

        if ($is_nilai_exists) {
            $alert = $is_nilai_exists->waktu_selesai ? 
                                'Anda telah mengerjakan tes ini sebelumnya, Silahkan periksa kembali!' : 
                                'Anda sudah memiliki sesi tes ini, silahkan periksa dan ulangi kembali!';

            return redirect()->route('peserta_tes.index')
                                ->with('error', $alert);
        }
        
        if ($data['tes']->sekolah_id != $profil->sekolah_id) {
            return redirect()->back();
        }

        return view('peserta-tes.boarding', $data);
    }

    public function access($tes, Request $request)
    {
        $tes = Tes::find($tes);
        $profil = Profil::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();

        $kumpulan_tes_saat_ini = [];
        if (session()->has('tes_saat_ini')) {
            $kumpulan_tes_saat_ini = session()->get('tes_saat_ini');
        }

        $token = uniqid();

        $nilai_tes = $tes->nilaiTes()->create([
            'peserta_id'            => auth()->guard(session()->get('role'))->user()->id,
            'tes_id'                => $tes->id,
            'nilai'                 => null,
            'waktu_mulai'           => Carbon::now(),
            'waktu_selesai'         => null,
            'detail'                => null,
            'sekolah_id'            => $profil->sekolah_id,
        ]);

        $tes_saat_ini[$tes->id] = [
            'tes_id'                => $tes->id,
            'nilai_tes_id'          => $nilai_tes->id,
            'token'                 => $token,
            'vw'                    => $request->vw ?? 0,
            'dimulai_pada'          => Carbon::now(),
            'berakhir_pada'         => Carbon::now()->addMinutes($tes->durasi)
        ];

        array_push($kumpulan_tes_saat_ini, $tes_saat_ini);

        session()->put('tes_saat_ini', $tes_saat_ini);

        return redirect()->route('peserta_tes.start', [$tes->id, $token]);
    }

    public function start($tes, $token)
    {
        $tes = Tes::find($tes);

        $kumpulan_tes_saat_ini = session()->get('tes_saat_ini');
        if (isset($kumpulan_tes_saat_ini[$tes->id]) &&
            (isset($kumpulan_tes_saat_ini[$tes->id]) ?
            $kumpulan_tes_saat_ini[$tes->id]['token'] : false)
        ) {

            $jawaban = $tes->soalTes()->get(['id', 'jawaban', 'opsi', 'poin'])->toArray();

            $kumpulan_tes_saat_ini[$tes->id]['data'] = $jawaban;

            session()->put('tes_saat_ini', $kumpulan_tes_saat_ini);

            if ($kumpulan_tes_saat_ini[$tes->id]['vw'] <= 768 && request()->mode == null) {
                request()->mode = 'mobile';
            }

            $soals = $tes->status_acak == 1 ? $tes->soalTes->shuffle() : $tes->soalTes;

            $view = request()->mode == 'mobile' ? 'peserta-tes.mobile' : 'peserta-tes.desktop';

            return view($view, compact('tes', 'token','soals'));
        }

        return redirect()->route('peserta_tes.start')
                            ->with('error', 'Token yang Anda masukan tidak tepat, silahkan ulagi kembali!');
    }

    public function finish($tes, $token, Request $request)
    {
        $tes = Tes::find($tes);
        $kumpulan_tes_saat_ini = session()->get('tes_saat_ini');
        if (isset($kumpulan_tes_saat_ini[$tes->id]) &&
            (isset($kumpulan_tes_saat_ini[$tes->id]) ?
            $kumpulan_tes_saat_ini[$tes->id]['token'] : false)
        ) {
            $validator = Validator::make($request->all(), [
                'ans' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                                ->with('error', 'jawaban tidak boleh kosong!');
            }

            $details = [];
            $is_essay_exists = false;
            $total_poin = 0;
            $nilai_tes_id = $kumpulan_tes_saat_ini[$tes->id]['nilai_tes_id'];
            $soal_tes = $kumpulan_tes_saat_ini[$tes->id]['data'];
            foreach ($request->ans as $key => $value) {
                $array_key  = array_search($value['id'], array_column($soal_tes, 'id'));
                $original   = $soal_tes[$array_key];

                $request_jawaban = (is_array($value['answer'] ?? null) ? json_encode(array_values($value['answer'])) : $value['answer'] ?? null) ?? null;
                
                $details[$key] = [
                    'question_id'   => $value['id'],
                    'jawaban_benar' => $original['jawaban'],
                    'jawaban'       => ($value['answer'] ?? null),
                    'poin'          => $original['poin'],
                ];

                if ($original['jawaban'] == $request_jawaban) {
                    $details[$key]['benar'] = true;

                    $total_poin += $original['poin'];

                } else {
                    $details[$key]['benar'] = false;
                    $details[$key]['poin'] = 0;

                }
            }

            $data = [
                'nilai'         => $is_essay_exists ? null : $total_poin,
                'waktu_selesai' => Carbon::now(),
                'detail'        => json_encode($details),
            ];

            // dd($details);

            NilaiTes::findOrFail($nilai_tes_id)->update($data);
    
            unset($kumpulan_tes_saat_ini[$tes->id]);
            session()->put('tes_saat_ini', $kumpulan_tes_saat_ini);

            return redirect()->route('peserta_tes.index')
                                ->with('success', 'Selamat Anda sudah menyelesaikan tes');
        }

        return redirect()->route('peserta_tes.index')
                            ->with('alert', 'Token yang Anda masukan tidak tepat, silahkan ulagi kembali!');        
    }

    public function exit($tes, $token)
    {
        $tes = Tes::find($tes);
        $kumpulan_tes_saat_ini = session()->get('tes_saat_ini');
        if (isset($kumpulan_tes_saat_ini[$tes->id]) &&
            (isset($kumpulan_tes_saat_ini[$tes->id]) ?
            $kumpulan_tes_saat_ini[$tes->id]['token'] : false)
        ) {
            $nilai_tes_id = $kumpulan_tes_saat_ini[$tes->id]['nilai_tes_id'];

            NilaiTes::findOrFail($nilai_tes_id)->delete();

            unset($kumpulan_tes_saat_ini[$tes->id]);
            session()->put('tes_saat_ini', $kumpulan_tes_saat_ini);

            return redirect()->route('peserta_tes.index')
                                ->with('alert', 'Anda telah keluar dari Penilaian Harian!');
        }
    }
}