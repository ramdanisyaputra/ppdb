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
                    <a href="#">Form Dinas</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Form Dinas
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
                <form action="{{route('dinas.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tingkat">Tingkat</label>
                                <input type="text" name="tingkat" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="program">Program</label>
                                <input type="text" name="program" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="reg">Reg</label>
                                <input type="text" name="reg" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="alert alert-primary" role="alert">
                                IDENTITAS PESERTA DIDIK (WAJIB DI ISI)
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{auth()->guard(session()->get('role'))->user()->nama}}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan'}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_seri_ijazah">No Seri Ijazah</label>
                                <input type="text" name="no_seri_ijazah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_seri_skhun">No Seri SKHUN</label>
                                <input type="text" name="no_seri_skhun" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_ujian_nasional">No Ujian Nasional</label>
                                <input type="text" name="no_ujian_nasional" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->nik}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="npsn">NPSN Sekolah Asal</label>
                                <input type="text" name="npsn" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Sekolah Asal</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->asal_sekolah}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tempat, Tanggal Lahir</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->ttl}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" name="agama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berkebutuhan_khusus">Berkebutuhan Khusus</label>
                                <input type="text" name="berkebutuhan_khusus" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="" id="" class="form-control" cols="30" rows="2" disabled>{{auth()->guard(session()->get('role'))->user()->profil->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input type="text" name="dusun" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="text" name="rt" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text" name="rw" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <input type="text" name="desa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="propinsi">Propinsi</label>
                                <input type="text" name="propinsi" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alat_transportasi">Alat Transportasi</label>
                                <input type="text" name="alat_transportasi" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenis_tinggal">Jenis Tinggal</label>
                                <input type="text" name="jenis_tinggal" placeholder="Contoh : Tinggal Bersama Orang Tua" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp_rumah">No Telp Rumah</label>
                                <input type="text" name="no_telp_rumah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No HP</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->no_telp}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email Pribadi</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_kks">No KKS</label>
                                <input type="text" name="no_kks" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kps">Apakah Penerima KPS / PKH</label>
                                <input type="text" name="kps" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="no_kps">No KPS</label>
                                <input type="text" name="no_kps" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pip">Usulan dari sekolah Layak PIP</label>
                                <input type="text" name="pip" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="alasan_layak">Alasan Layak</label>
                                <input type="text" name="alasan_layak" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kip">Penerima KIP</label>
                                <input type="text" name="kip" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="no_kip">No KIP</label>
                                <input type="text" name="no_kip" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kip">Nama Tertera KIP</label>
                                <input type="text" name="nama_kip" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alasan_menolak_kip">Alasan Menolak KIP</label>
                                <input type="text" name="alasan_menolak_kip" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_registrasi_akta">No Registrasi Akta</label>
                                <input type="text" name="no_registrasi_akta" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lintang">Lintang</label>
                                <input type="text" name="lintang" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bujur">Bujur</label>
                                <input type="text" name="bujur" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="alert alert-primary" role="alert">
                                DATA AYAH KANDUNG (WAJIB DIISI)
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->nama_ayah}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun_lahir_ayah">Tahun Lahir</label>
                                <input type="text" name="tahun_lahir_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="berkebutuhan_khusus_ayah">Berkebutuhan Khusus Ayah</label>
                                <input type="text" name="berkebutuhan_khusus_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->pekerjaan_ayah}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pendidikan_ayah">Pendidikan Ayah</label>
                                <input type="text" name="pendidikan_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="penghasilan_bulanan_ayah">Penghasilan Bulanan</label>
                                <input type="text" name="penghasilan_bulanan_ayah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="alert alert-primary" role="alert">
                                DATA IBU KANDUNG (WAJIB DIISI)
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->nama_ibu}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun_lahir_ibu">Tahun Lahir</label>
                                <input type="text" name="tahun_lahir_ibu" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="berkebutuhan_khusus_ibu">Berkebutuhan Khusus</label>
                                <input type="text" name="berkebutuhan_khusus_ibu" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" value="{{auth()->guard(session()->get('role'))->user()->profil->pekerjaan_ibu}}" disabled class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pendidikan_ibu">Pendidikan Ibu</label>
                                <input type="text" name="pendidikan_ibu" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="alert alert-primary" role="alert">
                                DATA WALI
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" name="nama_wali" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun_lahir_wali">Tahun Lahir</label>
                                <input type="text" name="tahun_lahir_wali" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" name="pekerjaan_wali" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="pendidikan_wali">Pendidikan Wali</label>
                                <input type="text" name="pendidikan_wali" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="penghasilan_wali">Penghasilan Bulanan</label>
                                <input type="text" name="penghasilan_wali" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="alert alert-primary" role="alert">
                                DATA PERIODIK (WAJIB DIISI)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                <input type="text" name="tinggi_badan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="berat_badan">Berat Badan (kg)</label>
                                <input type="text" name="berat_badan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jarak_sekolah">Jarak Sekolah</label>
                                <input type="text" name="jarak_sekolah" placeholder="Contoh : Lebih dari 1 km" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jarak_sekolah_detail">Sebutkan (km)</label>
                                <input type="text" name="jarak_sekolah_detail" placeholder="Contoh : 10km" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_tempuh">Waktu Tempuh</label>
                                <input type="text" name="waktu_tempuh" placeholder="Contoh : Lebih dari 60 menit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu_tempuh_detail">Sebutkan (menit)</label>
                                <input type="text" name="waktu_tempuh_detail" placeholder="65 Menit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="saudara_kandung">Saudara Kandung</label>
                                <input type="number" name="saudara_kandung" placeholder="Contoh : 02" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
