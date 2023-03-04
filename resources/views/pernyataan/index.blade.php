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
                    @if($pernyataan != null)
                    <input type="button" value="Cetak Pernyataan" class="btn btn-primary btn-sm text-light" onclick="printDiv(cetak);" style="float:right"/>
                    @endif
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
                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Mengikuti semua program yang diselenggarakan oleh sekolah</span></li>
                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Mengikuti Proses Pendaftaran Hingga Selesai</span></li>
                    <li><span style="font-family:'Times New Roman';font-size:16px;font-size:12.0000pt;">&nbsp;</span><span style="font-family:'Times New Roman';font-size:12.0000pt;">Menaati Aturan Sekolah Terkait Pendaftaran</span></li>
                </ul>
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
