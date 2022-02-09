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
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
                @if( Session::get('error') !="")
                    <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
                @endif
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Durasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tes as $key => $row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->judul}}</td>
                                <td>{{$row->durasi}} Menit</td>
                                <td class="text-left">
                                    @if (isset(session()->get('tes_saat_ini')[$row->id]))
                                        <a 
                                            href="{{ route('peserta_tes.start', [$row->id, session()->get('tes_saat_ini')[$row->id]['token']]) }}" 
                                            class="btn btn-sm btn-warning px-3 rounded-pill shadow">
                                            Lanjutkan
                                        </a>
                                    @elseif ($row->nilaiTes()->where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->count() > 0)
                                    <?php
                                        $cek = $row->nilaiTes()->where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
                                    ?>
                                        @if($cek->status == 'belum')
                                        <button 
                                            class="btn btn-light btn-sm px-3 rounded-pill">
                                            Selesai, Tunggu Kabar Selanjutnya
                                        </button>
                                        @elseif($cek->status == 'lulus')
                                        <button 
                                            class="btn btn-light btn-sm px-3 rounded-pill">
                                            Selesai, Anda Lulus
                                        </button>
                                        @elseif($cek->status == 'remidi')
                                        <a 
                                            href="{{ route('peserta_tes.boarding2', $row->id) }}" 
                                            class="btn btn-sm btn-warning px-3 rounded-pill shadow">
                                            Anda Remidi, Silahkan Mengulang
                                        </a>
                                        @else
                                        <button 
                                            class="btn btn-light btn-sm px-3 rounded-pill">
                                            Selesai, Maaf anda gugur
                                        </button>
                                        @endif
                                    @else
                                        <a 
                                            href="{{ route('peserta_tes.boarding', $row->id) }}" 
                                            class="btn btn-sm btn-success px-3 rounded-pill shadow">
                                            Kerjakan
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
