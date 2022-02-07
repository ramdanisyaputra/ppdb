@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Detail</h4>
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
                    <a href="#">Detail Profil</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Profil
                    &nbsp;
                    <a href="{{route('pendaftar.edit_profil', $profil->id)}}" class="btn btn-primary btn-sm text-light" style="float:right">Edit Data</a>
                </h4>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->peserta->nama}}</td>
                    </tr>
                    <tr>
                        <td>Nama Panggilan</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->panggilan}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->nik}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->jenis_kelamin == 'L' ? 'Laki - laki' : 'Perempuan'}}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->ttl}}</td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->asal_sekolah}}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->kelas}}</td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->nama_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->nama_ibu}}</td>
                    </tr>
                    <tr>
                        <td>No Telp Ayah</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->no_telp_ayah}}</td>
                    </tr>
                    <tr>
                        <td>No Telp Ibu</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->no_telp_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->pekerjaan_ayah}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->pekerjaan_ibu}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Sekolah yang di tuju</td>
                        <td class="px-2">:</td>
                        <td>{{$profil->sekolah->nama}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
