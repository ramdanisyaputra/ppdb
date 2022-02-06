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
                    <a href="{{route('nilai_tes.index')}}">Nilai Tes</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pengerjaan</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Detail Pengerjaan Tes
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <ol class="question-list">
                        @foreach (json_decode($nilaiTes->detail) as $key => $detail)
                        @php
                            $soal = $tes->soalTes()->find($detail->question_id);
                        @endphp
                        <li class="question-item mb-3">
                            <div class="question">{!! $soal->soal !!}</div>
                                <ol type="a" class="option-list" style="margin-left:-20px">
                                    @foreach (json_decode($soal->opsi) as $alpha => $opsi)
                                    <li class="option-item {{ ($detail->jawaban_benar == $alpha) && $detail->benar ? 'correct' : ($alpha == $detail->jawaban ? 'wrong' : '') }}">{!! $opsi !!}</li>
                                    @endforeach
                                </ol>
                            <div class="p-2 mt-2 border">
                                <table class="preview-detail">
                                    <tr>
                                        <td>Jawaban</td>
                                        <td class="px-2">:</td>
                                        <td class="font-weight-bold ">{!! $detail->jawaban ?? 'Tidak diisi' !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Jawaban Benar</td>
                                        <td class="px-2">:</td>
                                        <td class="font-weight-bold ">{!! $detail->jawaban_benar !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td class="px-2">:</td>
                                        <td class="font-weight-bold ">{{ $detail->benar ? 'Benar' : 'Salah' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Poin Soal</td>
                                        <td class="px-2">:</td>
                                        <td class="font-weight-bold ">{!! $detail->poin !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
