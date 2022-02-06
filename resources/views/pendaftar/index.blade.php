@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pendaftar</h4>
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
                    <a href="#">Data Pendaftar</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pendaftar
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tujuan Sekolah</th>
                                <th>No Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peserta as $key => $row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->profil->sekolah->nama ?? '-'}}</td>
                                <td>{{$row->no_telp}}</td>
                                <td>
                                    <a href="{{route('pendaftar.detail', $row->id)}}" title="Detail" class="btn btn-icon btn-round btn-primary btn-sm">
                                        <i class="fa fa-eye mt-2"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
