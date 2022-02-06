@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Detail Soal</h4>
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
                    <a href="#">Detail Soal</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Detail Soal
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <table class="table-rincian">
                        <tr>
                            <td>Judul</td>
                            <td class="px-2">:</td>
                            <td>{{$tes->judul}}</td>
                        </tr>
                        <tr>
                            <td>Durasi</td>
                            <td class="px-2">:</td>
                            <td>{{$tes->durasi}} Menit</td>
                        </tr>
                    </table>
                    <hr>
                    <div class="mt-3">
                        <ol class="pl-4">
                        @foreach($soalTes as $s)
                            <li class="mb-4 pl-2">
                                {!! $s->soal !!}
                                <ol type="A" class="pl-3 mt-2">
                                    @foreach (json_decode($s->opsi) as $opsi)
                                    <li class="pl-1">{!! $opsi !!}</li>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

