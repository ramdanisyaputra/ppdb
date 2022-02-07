@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Form Dinas</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('pendaftar.index')}}">Pendaftar</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Form Dinas</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Form Dinas
                    &nbsp;
                    <input type="button" value="Cetak Form" class="btn btn-primary btn-sm text-light" onclick="printDiv(cetak);" style="float:right"/>
                </h4>
            </div>
            <div class="card-body" id="cetak">
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tanggal}}</td>
                    </tr>
                    <tr>
                        <td>Tingkat</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tingkat}}</td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->program}}</td>
                    </tr>
                    <tr>
                        <td>Reg</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->reg}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    IDENTITAS PESERTA DIDIK
                </div>
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->nama}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan'}}</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->nisn}}</td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->nis}}</td>
                    </tr>
                    <tr>
                        <td>No Seri Ijazah</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_seri_ijazah}}</td>
                    </tr>
                    <tr>
                        <td>No Seri SKHUN</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_seri_skhun}}</td>
                    </tr>
                    <tr>
                        <td>No Ujian Nasional</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_ujian_nasional}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->nik}}</td>
                    </tr>
                    <tr>
                        <td>NPSN Sekolah Asal</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->npsn}}</td>
                    </tr>
                    <tr>
                        <td>Nama Sekolah Asal</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->asal_sekolah}}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->ttl}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->agama}}</td>
                    </tr>
                    <tr>
                        <td>Berkebutuhan Khusus</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->berkebutuhan_khusus}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Dusun</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->dusun}}</td>
                    </tr>
                    <tr>
                        <td>RT</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->rt}}</td>
                    </tr>
                    <tr>
                        <td>RW</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->rw}}</td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->desa}}</td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->kode_pos}}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->kecamatan}}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->kabupaten}}</td>
                    </tr>
                    <tr>
                        <td>propinsi</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->propinsi}}</td>
                    </tr>
                    <tr>
                        <td>Alat Transportasi</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->alat_transportasi}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Tinggal</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->jenis_tinggal}}</td>
                    </tr>
                    <tr>
                        <td>No Telp Rumah</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_telp_rumah}}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->no_telp}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->email}}</td>
                    </tr>
                    <tr>
                        <td>No KKS</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_kks}}</td>
                    </tr>
                    <tr>
                        <td>Apakah Penerima KPS / PKH</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->kps}}</td>
                    </tr>
                    <tr>
                        <td>No KPS</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_kps}}</td>
                    </tr>
                    <tr>
                        <td>Usulan dari sekolah Layak PIP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->pip}}</td>
                    </tr>
                    <tr>
                        <td>Alasan Layak</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->alasan_layak}}</td>
                    </tr>
                    <tr>
                        <td>Penerima KIP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->kip}}</td>
                    </tr>
                    <tr>
                        <td>No KIP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_kip}}</td>
                    </tr>
                    <tr>
                        <td>Nama Tertera KIP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->nama_kip}}</td>
                    </tr>
                    <tr>
                        <td>Alasan Menolak KIP</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->alasan_menolak_kip}}</td>
                    </tr>
                    <tr>
                        <td>No Registrasi Akta</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->no_registrasi_akta}}</td>
                    </tr>
                    <tr>
                        <td>Lintang</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->lintang}}</td>
                    </tr>
                    <tr>
                        <td>Bujur</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->bujur}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    IDENTITAS AYAH KANDUNG
                </div>
                <table>
                    <tr>
                        <td>Nama Ayah</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->nama_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Tahun Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tahun_lahir_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Berkebutuhan Khusus</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->berkebutuhan_khusus_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->pekerjaan_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->pendidikan_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Penghasilan Bulanan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->penghasilan_bulanan_ayah}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    IDENTITAS IBU KANDUNG
                </div>
                <table>
                    <tr>
                        <td>Nama Ibu</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->nama_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Tahun Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tahun_lahir_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Berkebutuhan Khusus</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->berkebutuhan_khusus_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->peserta->profil->pekerjaan_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->pendidikan_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Penghasilan Bulanan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->penghasilan_bulanan_ibu}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    IDENTITAS IBU KANDUNG
                </div>
                <table>
                    <tr>
                        <td>Nama wali</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->nama_wali}}</td>
                    </tr>
                    <tr>
                        <td>Tahun Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tahun_lahir_wali}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->pekerjaan_wali}}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->pendidikan_wali}}</td>
                    </tr>
                    <tr>
                        <td>Penghasilan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->penghasilan_wali}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    DATA PERIODIK
                </div>
                <table>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tinggi_badan}} cm</td>
                    </tr>
                    <tr>
                        <td>Berat Badan</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->berat_badan}} kg</td>
                    </tr>
                    <tr>
                        <td>Jarak Sekolah</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->jarak_sekolah}}</td>
                    </tr>
                    <tr>
                        <td>Jarak</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->jarak_sekolah_detail}}</td>
                    </tr>
                    <tr>
                        <td>Waktu Tempuh</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->waktu_tempuh}}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->waktu_tempuh_detail}}</td>
                    </tr>
                    <tr>
                        <td>Saudara Kandung</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->saudara_kandung}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    DATA PERIODIK
                </div>
                <table width="100%" class="table table-bordered">
                    <thead>
                        <th>Jenis Prestasi</th>
                        <th>Tingkat</th>
                        <th>Nama Prestasi</th>
                        <th>Tahun</th>
                        <th>Penyelenggaraan</th>
                    </thead>
                    <tbody>
                        @foreach($prestasi as $row)
                        <tr>
                            <td>{{$row->jenis_prestasi}}</td>
                            <td>{{$row->tingkat}}</td>
                            <td>{{$row->nama_prestasi}}</td>
                            <td>{{$row->tahun}}</td>
                            <td>{{$row->penyelenggaraan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="alert alert-primary mt-3" role="alert">
                    DATA PERIODIK
                </div>
                <table width="100%" class="table table-bordered">
                    <thead>
                        <th>Jenis</th>
                        <th>Penyelenggara / Sumber</th>
                        <th>Tahun Mulai</th>
                        <th>Tahun Selesai</th>
                    </thead>
                    <tbody>
                        @foreach($jenis as $row)
                        <tr>
                            <td>{{$row->jenis}}</td>
                            <td>{{$row->penyelenggara}}</td>
                            <td>{{$row->tahun_mulai}}</td>
                            <td>{{$row->tahun_selesai}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(cetak) {
    var printContents = document.getElementById("cetak").innerHTML;    
    var originalContents = document.body.innerHTML;      

    document.body.innerHTML = printContents;     
    window.print();     
    document.body.innerHTML = originalContents;
}
</script>
@endsection

