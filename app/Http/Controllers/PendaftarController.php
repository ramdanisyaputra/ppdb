<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use App\Models\Jenis;
use App\Models\NilaiTes;
use App\Models\Pernyataan;
use App\Models\Peserta;
use App\Models\Prestasi;
use App\Models\Profil;
use App\Models\Sekolah;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

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
        $data['peserta_id'] = $peserta;
        $data['profil'] = Profil::where('peserta_id', $peserta)->first();
        $data['dinas'] = Dinas::where('peserta_id', $peserta)->first();
        $data['nilai_tes'] = NilaiTes::where('peserta_id', $peserta)->first();
        $data['pernyataan'] = Pernyataan::where('peserta_id', $peserta)->first();
        return view('pendaftar.detail', $data);
    }

    public function detailProfil($profil)
    {
        $data['profil'] = Profil::where('id', $profil)->first();
        return view('pendaftar.detail_profil', $data);
    }

    public function detailPernyataan($peserta)
    {
        $data['pernyataan'] = Pernyataan::where('peserta_id', $peserta)->first();
        return view('pendaftar.detail_pernyataan', $data);
    }

    public function editProfil($profil)
    {
        $data['sekolah'] = Sekolah::all();
        $data['tahun_ajaran'] = TahunAjaran::all();
        $data['profil'] = Profil::where('id', $profil)->first();
        return view('pendaftar.edit_profil', $data);
    }

    public function updateProfil(Request $request)
    {
        Profil::find($request->id)->update([
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'panggilan' => $request->panggilan,
            'nik' => $request->nik,
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

    public function detailDinas($peserta)
    {
        $data['dinas'] = Dinas::where('peserta_id', $peserta)->first();
        if($data['dinas'] != null){
            $data['prestasi'] = Prestasi::where('dinas_id', $data['dinas']->id)->get();
            $data['jenis'] = Jenis::where('dinas_id', $data['dinas']->id)->get();
        }
        $data['peserta'] = Peserta::find($peserta);
        return view('pendaftar.detail_dinas', $data);
    }

    public function detailLampiranDinas($peserta)
    {
        $data['dinas'] = Dinas::where('peserta_id', $peserta)->first();
        $data['peserta'] = Peserta::find($peserta);
        return view('pendaftar.detail_lampiran_dinas', $data);
    }

    public function updateLampiranDinas(Request $request)
    {
        $request->validate([
            'kk' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'akte' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageKK = time().'.'.$request->kk->extension();

        $imageAkte = time().'.'.$request->akte->extension();

        $imageFoto = time().'.'.$request->foto->extension();

        $request->kk->move(public_path('/images/lampiran/kk'), $imageKK);
        $request->akte->move(public_path('/images/lampiran/akte'), $imageAkte);
        $request->foto->move(public_path('/images/lampiran/foto'), $imageFoto);

        Dinas::find($request->id)->update([
            'kk' => $imageKK,
            'akte' => $imageAkte,
            'foto' => $imageFoto
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Lamiran');

    }

    public function updateNilaiStatus(Request $request)
    {
        NilaiTes::find($request->id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Berhasil Merubah Status');
    }

    public function pdfDinas($peserta)
    {
        $data['dinas'] = Dinas::where('peserta_id', $peserta)->first();
        $data['prestasi'] = Prestasi::where('dinas_id', $data['dinas']->id)->get();
        $data['jenis'] = Jenis::where('dinas_id', $data['dinas']->id)->get();
        return view('pendaftar.pdf_dinas', $data);
    }
    
    public function storeDinas(Request $request)
    {
        $dinas = Dinas::create([
            'peserta_id' => $request->peserta_id,
            'tanggal' => $request->tanggal,
            'tingkat' => $request->tingkat_form,
            'program' => $request->program,
            'reg' => $request->reg,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_ujian_nasional' => $request->no_ujian_nasional,
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
            'kode_pos' => $request->kode_pos,
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

    public function updateDinas(Request $request)
    {
        Dinas::find($request->id)->update([
            'tanggal' => $request->tanggal,
            'tingkat' => $request->tingkat_form,
            'program' => $request->program,
            'reg' => $request->reg,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'no_seri_ijazah' => $request->no_seri_ijazah,
            'no_seri_skhun' => $request->no_seri_skhun,
            'no_ujian_nasional' => $request->no_ujian_nasional,
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
            'kode_pos' => $request->kode_pos,
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
                    'dinas_id' => $request->id,
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
                    'dinas_id' => $request->id,
                    'jenis' => $request->jenis[$key],
                    'penyelenggara' => $request->penyelenggara[$key],
                    'tahun_mulai' => $request->tahun_mulai[$key],
                    'tahun_selesai' => $request->tahun_selesai[$key],
                ]);
            }
        }

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }

    public function detailTes($peserta)
    {
        $data['nilaiTes'] = NilaiTes::where('peserta_id', $peserta)->get();
        $data['peserta'] = Peserta::find($peserta);
        return view('pendaftar.detail_tes', $data);
    }
}
