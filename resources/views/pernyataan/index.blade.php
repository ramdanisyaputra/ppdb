@extends('layouts.layout')
@section('content')
<style type="text/css">
    .canvas{
        background: #fff;border: 1px solid #000
    }
</style>

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pernyataan</h4>
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
                    <a href="#">Pernyataan</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Pernyataan
                    &nbsp;
                    <input type="button" value="Cetak Pernyataan" class="btn btn-primary btn-sm text-light" onclick="printDiv(cetak);" style="float:right"/>
                </h4>
            </div>
            <div class="card-body" id="cetak">
                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><strong><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">SURAT</span></strong><strong><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;PERNYATAAN</span></strong></p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span></p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Saya yang bertanda tangan di bawah ini,</span></p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Nama&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">: &nbsp; @if($pernyataan == null)</span><input type="text" name="nama" id="nama" required placeholder="Isi nama">@else {{$pernyataan->nama}} @endif</p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Nama ana</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">k</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">: &nbsp;{{auth()->guard(session()->get('role'))->user()->nama}}</span></p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Masuk tahun pelajaran</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">: &nbsp;{{$profil->tahunAjaran->nama}}</span></p>
                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Dengan ini menyatakan sanggup :</span></p>
                <ul style="list-style-type: undefined;margin-left:8px;">
                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">1.&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Mengikuti semua program yang diselenggarakan oleh sekolah, meliputi :</span></li>
                </ul>
                <table style="border-collapse:collapse;width:483.5500pt;margin-left:18.0000pt;border:none;">
                    <tbody>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">a.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">Tabungan Pendidikan</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Tabungan ananda</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">diperuntukkan</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">biaya</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">pendidikan</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;selama di SD</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">b.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">Qurban</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">S</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">iap</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">berkurban minimal 1 kali selama</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">sekolah di SD</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">c.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">PEKA</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Peduli</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Kawan</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">setiap</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Jumat</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;diperuntukkan bagi siswa kurang mampu&nbsp;</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">d.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">TSK</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Tabung</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Sedekah</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">setiap</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">bulan</span><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">&nbsp;untuk beasiswa siswa berprestasi</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">e.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">KAYA</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">Kelas Asuh Yatim Dhuafa</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">f.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">Program Kesiswaan &nbsp;</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Pendidikan karakter, mentoring asik, Jumat Mubarok, pesantren kilat,&nbsp;</span><em><span style="font-family:'Times New Roman';line-height:150%;font-style:italic;font-size:16px;">field trip</span></em><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">,&nbsp;</span><em><span style="font-family:'Times New Roman';line-height:150%;font-style:italic;font-size:16px;">assembly,&nbsp;</span></em><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">kemah pramuka, dan lain-lain.</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 22.85pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <ul style="list-style-type: undefined;margin-left:8px;">
                                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">g.&nbsp;</span></li>
                                </ul>
                            </td>
                            <td style="width: 127.6pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">Program Cambridge &nbsp;</span></p>
                            </td>
                            <td style="width: 14.15pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:16px;">:&nbsp;</span></p>
                            </td>
                            <td style="width: 318.95pt;padding: 0pt 5.4pt;border-width: initial;border-style: none;border-color: initial;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Kegiatan yang dilaksanakan untuk mendukung program Cambridge Assessment:</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul style="list-style-type: undefined;margin-left:50.6px;">
                    <li><span style="font-family:Symbol;font-size:12.0000pt;">&middot;&nbsp;</span><em><span style="font-family:'Times New Roman';font-size:12.0000pt;">English Camping</span></em><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;(peningkatan kemampuan berbahasa Inggris dengan kegiatan outdoor)</span></li>
                    <li><span style="font-family:Symbol;font-size:12.0000pt;">&middot;&nbsp;</span><em><span style="font-family:'Times New Roman';font-size:12.0000pt;">Edutrip goes to abroad</span></em><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;(peningkatan wawasan global dengan belajar di&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Singapura&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">dan&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Malaysia</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">)</span></li>
                    <li><span style="font-family:Symbol;font-size:12.0000pt;">&middot;&nbsp;</span><em><span style="font-family:'Times New Roman';font-size:12.0000pt;">Checkpoint</span></em><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;(assessment yang dilaksanakan pada saat siswa kelas 6, untuk melihat kemampuan siswa selama mengikuti pembelajaran Primary Cambridge)</span></li>
                    <li><span style="font-family:Symbol;font-size:12.0000pt;">&middot;&nbsp;</span><em><span style="font-family:'Times New Roman';font-size:12.0000pt;">Progression</span></em><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;Test (assessment tahunan yang dilaksanakan mulai dari kelas 3)</span></li>
                </ul>
                <div class="m-4">
                    <span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">2.&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Menyerahkan fotocopy KK dan &nbsp;AKTA Kelahiran</span>
                    <br>
                    <span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">3.&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Menyetujui prosedur pengunduran diri sebagai siswa SD sesuai ketentuan :</span>
                </div>
                <table width="100%" class="table">
                    <tbody>
                        <tr>
                            <td rowspan="2" style="width:28.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:1.0000pt solid windowtext;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">No</span></p>
                            </td>
                            <td rowspan="2" style="width:70.8000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:1.0000pt solid windowtext;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Jenis Pembayaran</span></p>
                            </td>
                            <td colspan="2" style="width:219.7500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:1.0000pt solid windowtext;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Besaran yang dikembalikan</span></p>
                            </td>
                            <td rowspan="2" style="width:155.9500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:1.0000pt solid windowtext;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Keterangan</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:106.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Mengundurkan diri&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:15px;">Sebelum</span></strong><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;Tahun Pelajaran Baru yang ditetapkan oleh Pemerintah di mulai</span></p>
                            </td>
                            <td style="width:113.4500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Mengundurkan diri&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:15px;">Saat&nbsp;</span></strong><span style="font-family:'Times New Roman';font-size:15px;">Tahun Pelajaran Baru yang ditetapkan oleh Pemerintah hingga 31 Juli di mulai</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">1</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">BPI Inden</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">0%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">0%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><em><span style="font-family:'Times New Roman';font-style:italic;font-size:15px;">Diwakafkan&nbsp;</span></em><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">untuk pondok pesantren</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">2</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">BPI Tahap 1</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">50%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">25%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><em><span style="font-family:'Times New Roman';font-size:15px;">Pengembalian BPI jika sudah melaksanakan DU dan&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">akan</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">diproses</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">setelah</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">tahun</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">ajaran</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">baru</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">dimulai (Juli 202</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">1</span></em><em><span style="font-family:'Times New Roman';font-size:15px;">)</span></em></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width:28.3500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">No</span></p>
                            </td>
                            <td rowspan="2" style="width:70.8000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Jenis Pembayaran</span></p>
                            </td>
                            <td colspan="2" style="width:219.7500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Besaran yang dikembalikan</span></p>
                            </td>
                            <td rowspan="2" style="width:155.9500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Keterangan</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:106.3000pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Mengundurkan diri&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:15px;">Sebelum</span></strong><span style="font-family:'Times New Roman';font-size:15px;">&nbsp;Tahun Pelajaran Baru yang ditetapkan oleh Pemerintah di mulai</span></p>
                            </td>
                            <td style="width:113.4500pt;padding:0.0000pt 5.4000pt 0.0000pt 5.4000pt ;border-left:1.0000pt solid windowtext;border-right:1.0000pt solid windowtext;border-top:none;border-bottom:1.0000pt solid windowtext;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Mengundurkan diri&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:15px;">Saat&nbsp;</span></strong><span style="font-family:'Times New Roman';font-size:15px;">Tahun Pelajaran Baru yang ditetapkan oleh Pemerintah hingga 31 Juli di mulai</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">3</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">SPP</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><em><span style="font-family:'Times New Roman';font-size:15px;">Syarat dan ketentuan berlaku</span></em></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">4</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Seragam</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><em><span style="font-family:'Times New Roman';font-size:15px;">Syarat dan ketentuan berlaku</span></em></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">5</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Buku&nbsp;</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">100%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><em><span style="font-family:'Times New Roman';font-size:15px;">Syarat dan ketentuan berlaku</span></em></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 28.35pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">6</span></p>
                            </td>
                            <td style="width: 70.8pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">Wakaf Pendidikan</span></p>
                            </td>
                            <td style="width: 106.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">0%</span></p>
                            </td>
                            <td style="width: 113.45pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:center;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">0%</span></p>
                            </td>
                            <td style="width: 155.95pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';font-size:15px;">-</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="m-4">
                    <span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">4.&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Pelunasan pembayaran Daftar Ulang adalah&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:12.0000pt;">1 pekan</span></strong><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;</span><strong><span style="font-family:'Times New Roman';font-size:12.0000pt;">(terhitung dari hari pendaftaran).&nbsp;</span></strong><span style="font-family:'Times New Roman';font-size:12.0000pt;">Jika dalam rentang waktu Daftar Ulang tidak melakukan konfirmasi maka calon siswa dianggap mengundurkan diri.</span>
                    <br>
                    <span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">5.&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Membayar biaya Daftar Ulang&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">anak kami</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">&nbsp;sebesar :</span>
                </div>
                <table class="table" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><strong><span style="font-family:'Times New Roman';font-size:16px;">No</span></strong></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><strong><span style="font-family:'Times New Roman';font-size:16px;">Item Pembayaran</span></strong></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><strong><span style="font-family:'Times New Roman';font-size:16px;">Besaran</span></strong></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-width: 1pt;border-style: solid;border-color: windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><strong><span style="font-family:'Times New Roman';font-size:16px;">Keterangan</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3" style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;"><span style="font-family:'Times New Roman';font-size:16px;">1</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">BPI</span><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;Inden ...</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">................</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Dibayarkan sebagai syarat mendapat kursi inden</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">BPI Tahap 1</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">................</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Dibayarkan saat daftar ulang&nbsp;</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">BPI Tahap 2 - 4</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">................</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Dibayarkan dengan rincian:&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">2.000.000 naik kelas 2&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">2.000.000 naik kelas 3</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">................ naik kelas 4</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">2</span></p>
                            </td>
                            <td rowspan="2" style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">SPP</span></p>
                            </td>
                            <td rowspan="2" style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">800.000</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Bulanan</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><strong><span style="font-family:'Times New Roman';font-weight:bold;font-size:16px;">Naik 10% setiap tahun&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">3</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Kegiatan</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">0</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Semester (menyesuaikan kebutuhan setiap semester)</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;"><span style="font-family:'Times New Roman';font-size:16px;">4</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Registrasi Cambridge</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">125.000</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Tahunan</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">5</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Buku</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">800.000</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Semester (menyesuaikan kebutuhan setiap semester)</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">6</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Seragam</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">850.000</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">1 kali</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">7</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">Wakaf</span><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span><span style="font-family:'Times New Roman';font-size:16px;">Pendidikan</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">................</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;line-height:114%;"><span style="font-family:'Times New Roman';font-size:16px;">1 kali</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Total&nbsp;</span></p>
                            </td>
                            <td style="width: 87pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">................</span></p>
                            </td>
                            <td style="width: 246.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 25.5pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:center;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                            </td>
                            <td style="width: 117.25pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">Keteragan&nbsp;</span></p>
                            </td>
                            <td colspan="2" style="width: 333.3pt;padding: 0pt 5.4pt;border-left: 1pt solid windowtext;border-right: 1pt solid windowtext;border-top: none;border-bottom: 1pt solid windowtext;vertical-align: top;">
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                                <p style="margin-bottom:0.0000pt;margin-left:0.0000pt;text-align:justify;"><span style="font-family:'Times New Roman';font-size:16px;">&nbsp;</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p style="margin-bottom:0.0000pt;margin-left:18.0000pt;text-indent:36.0000pt;text-align:justify;line-height:150%;"><span style="font-family:'Times New Roman';line-height:150%;font-size:16px;">Demikian, surat pernyataan ini saya tanda tangani dengan sadar dan tanpa paksaan dari pihak manapun, untuk dapat dipergunakan sebagaimana mestinya.</span></p>
                @if($pernyataan != null)
                <div style="float:right">
                    <table class="mt-4">
                        <tr>
                            <td class="text-center">Surakarta, Orang Tua / Wali</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{asset('images/signature/'.$pernyataan->foto)}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">{{$pernyataan->nama}}</td>
                        </tr>
                    </table>
                </div>
                @endif
                @if($pernyataan == null)
                <center>Tanda tangan dibawah ini</center>
                <center>
                    <canvas class="canvas"></canvas>
                </center>
                <center>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </center>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(cetak) {
    var printContents = document.getElementById("cetak").innerHTML;    
    var originalContents = document.body.innerHTML;      

    document.body.innerHTML = printContents;     
    window.print();     
    document.body.innerHTML = originalContents;
}
</script>
@endsection
@push('scripts')
@if($pernyataan == null)
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">

	var canvas = document.querySelector("canvas");

    var signaturePad = new SignaturePad(canvas);

	$(document).on('click','.btn',function(){
        if(document.getElementById('nama').value !== ""){
            var signature =	signaturePad.toDataURL(); 
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                
                url: "{{route('pernyataan.store')}}",
                data :{
                    _token : CSRF_TOKEN,
                    nama : document.getElementById('nama').value,
                    foto: signature,
                },
                method: "POST",
                success:function(){

                    location.reload();
                }

            })
        }else{
            alert('Nama Harus Diisi');
        }
	})
	
</script>
@endif
@endpush
