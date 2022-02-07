@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Lampiran Form</h4>
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
                    <a href="#">Lampiran</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Lampiran {{$peserta->nama}}
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                @if($dinas->akte != null)
                <h4>Data Sebelumnya</h4>
                <table>
                    <tr>
                        <td>Lampiran Akte</td>
                        <td class="px-2">:</td>
                        <td><a href="{{asset('images/lampiran/akte/'. $dinas->akte)}}" target="_blank">Download Akta</a></td>
                    </tr>
                    <tr>
                        <td>Lampiran KK</td>
                        <td class="px-2">:</td>
                        <td><a href="{{asset('images/lampiran/kk/'. $dinas->kk)}}" target="_blank">Download Lampiran</a></td>
                    </tr>
                    <tr>
                        <td>Lampiran Foto</td>
                        <td class="px-2">:</td>
                        <td><a href="{{asset('images/lampiran/foto/'. $dinas->foto)}}" target="_blank">Download Foto</a></td>
                    </tr>
                </table>
                @endif
                <hr>
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
                <form action="{{route('pendaftar.update_lampiran_dinas')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$dinas->id}}">
                    <div class="form-group">
                        <label for="akte">Akte Kelahiran (format : gambar)</label>
                        <input type="file" name="akte" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kk">Kartu Keluarga (format : gambar)</label>
                        <input type="file" name="kk" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto (format : gambar)</label>
                        <input type="file" name="foto" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection