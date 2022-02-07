<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Jenis;
use App\Models\Prestasi;
use App\Models\Profil;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPeserta');
    }
    
    public function index()
    {
        // $data['dinas'] = Dinas::where('id', auth()->guard(session()->get('role'))->user()->id)->first();
        return view('dinas.index');
    }

    public function store(Request $request)
    {
        $dinas = Dinas::create([
            'peserta_id' => auth()->guard(session()->get('role'))->user()->id,
            'tanggal' => $request->tanggal,
            'tingkat' => $request->tingkat,
            'program' => $request->program,
            'reg' => $request->reg,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_ujian_nasional' => $request->no_ujian_nasional,
            'nik' => $request->nik,
            'npsn' => $request->npsn,
            'agama' => $request->agama,
            'berkebutuhan_khusus' => $request->berkebutuhan_khusus,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'propinsi' => $request->propinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alat_transportasi' => $request->alat_transportasi,
            'jenis_tinggal' => $request->jenis_tinggal,
            'no_telp_rumah' => $request->no_telp_rumah,
            'email' => $request->email,
            'no_kks' => $request->no_kks,
            'kps' => $request->kps,
            'no_kps' => $request->no_kps,
            'pip' => $request->pip,
            'alasan_layak' => $request->alasan_layak,
            'kip' => $request->kip,
            'no_kip' => $request->no_kip,
            'nama_kip' => $request->nama_kip,
            'alasan_menolak_kip' => $request->alasan_menolak_kip,
            'no_registrasi_akta' => $request->no_registrasi_akta,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'berkebutuhan_khusus_ayah' => $request->berkebutuhan_khusus_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
            'penghasilan_bulanan_ayah' => $request->penghasilan_bulanan_ayah,
            'berkebutuhan_khusus_ibu' => $request->berkebutuhan_khusus_ibu,
            'tahun_lahir_ibu' => $request->tahun_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'penghasilan_bulanan_ibu' => $request->penghasilan_bulanan_ibu,
            'tahun_lahir_wali' => $request->tahun_lahir_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jarak_sekolah_detail' => $request->jarak_sekolah_detail,
            'waktu_tempuh' => $request->waktu_tempuh,
            'waktu_tempuh_detail' => $request->waktu_tempuh_detail,
            'saudara_kandung' => $request->saudara_kandung,
        ]);

        if($request->jenis_prestasi != null){
            foreach($request->jenis_prestasi as $key => $row)
            {
                Prestasi::create([
                    'dinas_id' => $dinas->id,
                    'jenis_prestasi' => $request->jenis_prestasi[$key],
                    'tingkat' => $request->tingkat[$key],
                    'nama_prestasi' => $request->nama_prestasi[$key],
                    'tahun' => $request->tahun[$key],
                    'penyelenggaraan' => $request->penyelenggaraan[$key]
                ]);
            }
        }

        if($request->jenis != null){
            foreach($request->jenis as $key => $row)
            {
                Jenis::create([
                    'dinas_id' => $dinas->id,
                    'jenis' => $request->jenis[$key],
                    'penyelenggara' => $request->penyelenggara[$key],
                    'tahun_mulai' => $request->tahun_mulai[$key],
                    'tahun_selesai' => $request->tahun_selesai[$key],
                ]);
            }
        }

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $dinas = Dinas::find($request->id)->update([
            'tanggal' => $request->tanggal,
            'tingkat' => $request->tingkat,
            'program' => $request->program,
            'reg' => $request->reg,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_ujian_nasional' => $request->no_ujian_nasional,
            'nik' => $request->nik,
            'npsn' => $request->npsn,
            'agama' => $request->agama,
            'berkebutuhan_khusus' => $request->berkebutuhan_khusus,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'propinsi' => $request->propinsi,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alat_transportasi' => $request->alat_transportasi,
            'jenis_tinggal' => $request->jenis_tinggal,
            'no_telp_rumah' => $request->no_telp_rumah,
            'email' => $request->email,
            'no_kks' => $request->no_kks,
            'kps' => $request->kps,
            'no_kps' => $request->no_kps,
            'pip' => $request->pip,
            'alasan_layak' => $request->alasan_layak,
            'kip' => $request->kip,
            'no_kip' => $request->no_kip,
            'nama_kip' => $request->nama_kip,
            'alasan_menolak_kip' => $request->alasan_menolak_kip,
            'no_registrasi_akta' => $request->no_registrasi_akta,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'berkebutuhan_khusus_ayah' => $request->berkebutuhan_khusus_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
            'penghasilan_bulanan_ayah' => $request->penghasilan_bulanan_ayah,
            'berkebutuhan_khusus_ibu' => $request->berkebutuhan_khusus_ibu,
            'tahun_lahir_ibu' => $request->tahun_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'penghasilan_bulanan_ibu' => $request->penghasilan_bulanan_ibu,
            'tahun_lahir_wali' => $request->tahun_lahir_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'jarak_sekolah' => $request->jarak_sekolah,
            'jarak_sekolah_detail' => $request->jarak_sekolah_detail,
            'waktu_tempuh' => $request->waktu_tempuh,
            'waktu_tempuh_detail' => $request->waktu_tempuh_detail,
            'saudara_kandung' => $request->saudara_kandung,
        ]);

        if($request->jenis_prestasi != null){
            Prestasi::where('dinas_id', $request->id)->delete();
            foreach($request->jenis_prestasi as $key => $row)
            {
                Prestasi::create([
                    'dinas_id' => $dinas->id,
                    'jenis_prestasi' => $request->jenis_prestasi[$key],
                    'tingkat' => $request->tingkat[$key],
                    'nama_prestasi' => $request->nama_prestasi[$key],
                    'tahun' => $request->tahun[$key],
                    'penyelenggaraan' => $request->penyelenggaraan[$key]
                ]);
            }
        }

        if($request->jenis != null){
            Jenis::where('dinas_id', $request->id)->delete();
            foreach($request->jenis as $key => $row)
            {
                Jenis::create([
                    'dinas_id' => $dinas->id,
                    'jenis' => $request->jenis[$key],
                    'penyelenggara' => $request->penyelenggara[$key],
                    'tahun_mulai' => $request->tahun_mulai[$key],
                    'tahun_selesai' => $request->tahun_selesai[$key],
                ]);
            }
        }

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }
}
