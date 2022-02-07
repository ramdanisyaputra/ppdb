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
                    <a href="{{route('pendaftar.index')}}">Pendaftar</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Form Dinas</a>
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
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tanggal}}</td>
                    </tr>
                    <tr>
                        <td>Tingkat</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->tingkat}}</td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->program}}</td>
                    </tr>
                    <tr>
                        <td>Reg</td>
                        <td class="px-2">:</td>
                        <td>{{$dinas->reg}}</td>
                    </tr>
                </table>
                <div class="alert alert-primary" role="alert">
                    IDENTITAS PESERTA DIDIK (WAJIB DI ISI)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
