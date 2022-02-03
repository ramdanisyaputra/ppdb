<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\Sekolah;
use App\Models\SoalTes;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TesController extends Controller
{
    public function index()
    {
        $data['tes'] = Tes::all();
        $data['sekolah'] = Sekolah::all();
        return view('tes.index', $data);
    }

    public function store(Request $request)
    {
        Tes::create([
            'sekolah_id' => $request->sekolah_id,
            'judul' => $request->judul,
            'durasi' => $request->durasi,
            'panitia_id' => null,
            'status_acak' => $request->status_acak
        ]);

        return redirect()->back()->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        Tes::find($request->id)->update([
            'sekolah_id' => $request->sekolah_id,
            'judul' => $request->judul,
            'durasi' => $request->durasi,
            'status_acak' => $request->status_acak
        ]);

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }

    public function indexSoal($id){
        $data['tes'] = Tes::find($id);
        $data['soal_tes'] = SoalTes::where('tes_id', $id)->get();

        return view('tes.soal.index', $data);
    }

    public function createSoal(Tes $tes)
    {
        return view('tes.soal.create', compact('tes'));
    }

    public function storeSoal(Tes $tes, Request $request)
    {
        $validated = [
            'soal' => 'required',
            'opsi' => 'array|min:2',
            'jawaban' => 'required'
        ];

        $validator = Validator::make($request->all(), $validated);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Gagal menambahkan soal, silahkan ulangi kembali!');
        }

        $data = [
            'tes_id' => $tes->id,
            'soal' => $request->soal,
            'poin' => $request->poin ?? NULL,
            'opsi' => json_encode($request->opsi),
            'jawaban' => $request->jawaban,
        ];

        $tes->soalTes()->create($data);

        return redirect()->route('tes.soal.index', $tes->id)->with('success', 'Sukses menambahkan data');
    }

    public function editSoal(Tes $tes, SoalTes $soal)
    {
        $sekolahId = $this->authUser()->sekolah_id;
        $nilaiTes = NilaiTes::where('tes_id', $tes->id)->count();
        if($nilaiTes > 0){
            return redirect()->back()->with('alert','Soal tidak dapat di edit, karena telah terdapat nilai siswa yang sudah mengerjakan.');
        }
        return view('tes.soal.edit', compact('tes', 'soal'));
    }

    public function updateSoal(Tes $tes, SoalTes $soal, Request $request)
    {
        $validated = [
            'soal' => 'required',
            'tipe_soal' => 'required',
            'opsi' => 'array|min:2',
            'jawaban' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $validated);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Gagal mengubah soal, silahkan ulangi kembali!');
        }

        $data = [
            'tes_id' => $tes->id,
            'soal' => $request->soal,
            'poin' => $request->poin ?? NULL,
            'opsi' => json_encode($request->opsi),
            'jawaban' => $request->jawaban
        ];

        $soal->update($data);

        return redirect()->route('tes.soal.index', $tes->id)->with('success', 'Berhasil mengubah soal tes!');
    }

    public function destroySoal($tes, SoalTes $soal)
    {
       $tes;
       $scores = NilaiTes::where('tes_id', $tes)->count();
       if($scores > 0){
           return redirect()->back()->with('alert','Soal tidak dapat di hapus, karena telah terdapat nilai siswa yang sudah mengerjakan.');
       }
       $soal->delete();
       return redirect()->back()->with('success', 'Berhasil menghapus soal tes!');
    }

    public function destroyAll(Tes $tes)
    {
       $nilaiTes = NilaiTes::where('tes_id', $tes->id)->count();
       if($nilaiTes > 0){
           return redirect()->back()->with('alert','Soal tidak dapat di hapus, karena telah terdapat nilai siswa yang sudah mengerjakan.');
       }
       $tes->soalTes()->delete();

       return redirect()->back()->with('success', 'Berhasil menghapus semua soal tes!');
    }
}
