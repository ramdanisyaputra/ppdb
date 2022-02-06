@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Tes</h4>
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
                    <a href="#">Tes</a>
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
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Sekolah</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th>Status Acak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tes as $key => $row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->sekolah->nama}}</td>
                                <td>{{$row->durasi}} Menit</td>
                                <td class="{{$row->status == 0 ? 'text-danger' : 'text-success'}}">{{$row->status == 0 ? 'Belum Diterbitkan' : 'Sudah Diterbitkan'}}</td>
                                <td>{{$row->status_acak == 0 ? 'Tidak Diacak' : 'Diacak'}}</td>
                                <td>
                                    @if($row->status == 0)
                                    Terbitkan Terlebih Dahulu
                                    @else
                                    <a href="{{route('nilai_tes.detail', $row->id)}}" title="Detail" class="btn btn-icon btn-round btn-primary btn-sm">
                                        <i class="fa fa-eye mt-2"></i>
                                    </a>
                                    @endif
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
