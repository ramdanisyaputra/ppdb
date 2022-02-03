@extends('layouts.layout')
@section('content')
<style>
    .table-detail {
        width: 100%;
    }

    .table-detail tr td:first-child {
        min-width: 80px;
        width: 80px;
    }
    .table-detail tr td {
        vertical-align: top;
        padding-bottom: 5px;
        font-size: 14px;
    }

    .table-detail tr td:nth-child(3) {
        padding-left: 2px;
        padding-right: 120px;
    }
</style>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Soal Tes</h4>
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
                    <a href="{{route('tes.index')}}">Tes</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Soal Tes</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Tes
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <table class="table-detail">
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{$tes->judul}}</td>
                    </tr>
                    <tr>
                        <td>Sekolah</td>
                        <td>:</td>
                        <td>{{$tes->sekolah->nama}}</td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td>:</td>
                        <td>{{$tes->durasi}} Menit</td>
                    </tr>
                    <tr>
                        <td>Status Acak</td>
                        <td>:</td>
                        <td>{{$tes->status_acak == 0 ? 'Tidak Diacak' : 'Diacak'}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Soal
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Soal</th>
                                <th>Poin</th>
                                @if($tes->status != 1)
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
