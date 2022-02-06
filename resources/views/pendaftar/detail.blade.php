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
                    <a href="#">Detail</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Data Profil
                            &nbsp;
                        </h4>
                    </div>
                    <div class="card-body">
                        @if($profil != null )
                        <h4>Data profil peserta ini <span class="text-success">Sudah Lengkap</span>. Silahkan klik tombol dibawah untuk melihat selengkapnya.</h4>
                        <center><a href="{{route('pendaftar.detail_profil', $profil->id)}}" class="btn btn-primary">Detail</a></center>
                        @else
                        <h4>Data profil peserta ini <span class="text-danger">Belum Lengkap</span>.</h4>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Data Form Dinas
                            &nbsp;
                        </h4>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
