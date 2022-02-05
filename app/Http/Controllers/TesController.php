<?php

namespace App\Http\Controllers;

use App\Models\NilaiTes;
use App\Models\Sekolah;
use App\Models\SoalTes;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TesController extends Controller
{
    public function uploadImage(Request $request)
    {
        $file = $request->upload;
         
        $file_name = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
        
        $path = 'uploaded';
        
        Storage::put("$path/$file_name", file_get_contents($file), 'public');

        return response()->json([
            'fileName' => $file_name,
            "uploaded" => 1,
            'url' => Storage::url($path. '/' . $file_name),
        ]);
    }

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

    public function delete($id){

        $cek = SoalTes::where('tes_id', $id)->count();
        if($cek > 0){
            return redirect()->back()->with('error','Data tidak dapat dihapus dikarenakan masih ada soal !');
        }
        Tes::find($id)->delete();
        return redirect()->route('tes.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function status(Request $request)
    {
        $tes = Tes::find($request->id);
        if($tes->status == 0){
            $soalTes = SoalTes::where('tes_id',$request->id)->get();
            if(count($soalTes) == 0){
                return redirect()->back()->with('error','Soal masih kosong');
            }
            $pg = SoalTes::where('tes_id',$request->id)->get();
            $hitung = 100;

            $count_pg = count($pg) == 0 ? 1 : count($pg);
            $hasil = $hitung / $count_pg;
            
                foreach ($soalTes as $value) {
                    SoalTes::where('id',$value->id)->update([
                        'poin'=>round($hasil,2)
                    ]);
                }

            $tes->update([
                'status'=> '1'
            ]);

            return redirect()->back()->with('success','Soal berhasil di Terbitkan');
        }else{
            $nilaiTes = NilaiTes::where('tes_id', $tes->id)->count();
            if($nilaiTes > 0){
                return redirect()->back()->with('error','Soal tidak dapat di ubah, karena telah terdapat nilai siswa yang sudah mengerjakan.');
            }
            $tes->update([
                'status'=> '0'
            ]);
            SoalTes::where('tes_id',$request->id)->update([
                'poin'=>null
            ]);
            return redirect()->back()->with('success','Soal berhasil di Turunkan');
        }
    }


    public function indexSoal($id){
        $data['tes'] = Tes::find($id);
        $data['soal_tes'] = SoalTes::where('tes_id', $id)->get();

        return view('tes.soal.index', $data);
    }

    public function createSoal($tes)
    {
        $tes = Tes::find($tes);
        return view('tes.soal.create', compact('tes'));
    }

    public function storeSoal($tes, Request $request)
    {
        $tes = Tes::find($tes);
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
            'opsi' => json_encode($request->opsi),
            'jawaban' => $request->jawaban,
        ];

        $tes->soalTes()->create($data);

        return redirect()->route('tes.soal.index', $tes->id)->with('success', 'Sukses menambahkan data');
    }

    public function editSoal($tes, $soal)
    {
        $tes = Tes::find($tes);
        $soal = SoalTes::find($soal);
        $nilaiTes = NilaiTes::where('tes_id', $tes->id)->count();
        if($nilaiTes > 0){
            return redirect()->back()->with('alert','Soal tidak dapat di edit, karena telah terdapat nilai siswa yang sudah mengerjakan.');
        }
        return view('tes.soal.edit', compact('tes', 'soal'));
    }

    public function updateSoal($tes, $soal, Request $request)
    {
        $tes = Tes::find($tes);
        $soal = SoalTes::find($soal);
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

    public function deleteSoal($tes, $soal)
    {
       $soal = SoalTes::find($soal);
       $scores = NilaiTes::where('tes_id', $tes)->count();
       if($scores > 0){
           return redirect()->back()->with('error','Soal tidak dapat di hapus, karena telah terdapat nilai siswa yang sudah mengerjakan.');
       }
       $soal->delete();
       return redirect()->back()->with('success', 'Berhasil menghapus soal tes!');
    }

    public function deleteAll($tes)
    {
        $tes = Tes::find($tes);
        $nilaiTes = NilaiTes::where('tes_id', $tes->id)->count();
        if($nilaiTes > 0){
           return redirect()->back()->with('error','Soal tidak dapat di hapus, karena telah terdapat nilai siswa yang sudah mengerjakan.');
        }
        $tes->soalTes()->delete();

       return redirect()->back()->with('success', 'Berhasil menghapus semua soal tes!');
    }
}
