@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Profil</h4>
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
                    <a href="#">Profil</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Profil
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
                <form action="{{$profil == null ? route('profil.store') : route('profil.update')}}" method="post">
                @csrf
                
                @if($profil != null)
                    <input type="hidden" name="id" value="{{$profil->id}}">
                    @method('PUT')
                @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{auth()->guard(session()->get('role'))->user()->nama}}" disabled required>
                            </div>
                            <div class="form-group">
                                <label for="panggilan">Panggilan</label>
                                <input type="text" class="form-control" id="panggilan" name="panggilan" value="{{$profil != null ? $profil->panggilan : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="L" {{$profil != null ? ($profil->jenis_kelamin == 'L' ? 'selected' : '') : ''}}>Laki - laki</option>
                                    <option value="P" {{$profil != null ? ($profil->jenis_kelamin == 'P' ? 'selected' : '') : ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ttl">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" id="ttl" name="ttl" value="{{$profil != null ? $profil->ttl : ''}}" placeholder="Contoh : Bogor, 09 Januari 2001" required>
                            </div>
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" class="form-control" id="asal_sekolah" value="{{$profil != null ? $profil->asal_sekolah : ''}}" name="asal_sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{$profil != null ? $profil->kelas : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{$profil != null ? $profil->nama_ayah : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{$profil != null ? $profil->nama_ibu : ''}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp_ayah">No Telfon Ayah</label>
                                <input type="number" class="form-control" id="no_telp_ayah" name="no_telp_ayah" value="{{$profil != null ? $profil->no_telp_ayah : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp_ibu">No Telfon Ibu</label>
                                <input type="number" class="form-control" id="no_telp_ibu" name="no_telp_ibu" value="{{$profil != null ? $profil->no_telp_ibu : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{$profil != null ? $profil->pekerjaan_ayah : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{$profil != null ? $profil->pekerjaan_ibu : ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control">{{$profil != null ? $profil->alamat : ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="sekolah_id">Sekolah yang Dituju</label>
                                <select name="sekolah_id" id="sekolah_id" class="custom-select" required>
                                    <option value="" disabled selected>Pilih Sekolah</option>
                                    @foreach($sekolah as $row)
                                    <option value="{{$row->id}}" {{$profil != null ? ($profil->sekolah_id == $row->id ? 'selected' : '') : ''}}>{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <center>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
