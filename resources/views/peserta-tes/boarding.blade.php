@extends('layouts.ujian')
@section('content')

@section('nav-item')
<li class="nav-item dropdown hidden-caret">
    <a class="nav-link d-flex align-items-center" style="gap: 5px;" href="{{ route('peserta_tes.index') }}"><i class="dw dw-logout1"></i> Keluar</a>
</li>
@endsection

<div class="row content justify-content-center">
    <div class="page-inner col-xl-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Rincian Tes
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <table class="detail">
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
                    <tr>
                        <td>Jumlah Soal</td>
                        <td class="px-2">:</td>
                        <td>{{$tes->soalTes->count()}} Soal</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Persetujuan Peserta PPDB
                    &nbsp;
                </h4>
            </div>
            <div class="card-body">
                <div class="mt-4">
                    <div>Yang bersangkutan di bawah ini : </div>
                    <table class="mt-3">
                        <tr>
                            <td>Nama</td>
                            <td class="px-2">:</td>
                            <td>{{ auth()->guard(session()->get('role'))->user()->nama }}</td>
                        </tr>
                        <tr>
                            <td>Tujuan Sekolah</td>
                            <td class="px-2">:</td>
                            <td>{{ auth()->guard(session()->get('role'))->user()->profil->sekolah->nama }}</td>
                        </tr>
                    </table>

                    <div class="mt-3">Menyatakan bahwa saya akan mengerjakan soal dengan jujur serta tidak akan :</div>
                    <div class="mt-3 blog-detail">
                        <ol type="A">
                            <li>Menanyakan jawaban soal kepada peserta atau pihak lain.</li>
                            <li>Bekerja sama dengan peserta lain.</li>
                            <li>Memberi atau menerima bantuan dalam menjawab soal dari pihak manapun atau dengan cara apapun.</li>
                        </ol>
                    </div>

                    <div class="mt-3">Apabila saya melanggar maka saya bersedia menanggung segala akibatnya sesuai aturan yang berlaku.</div>
                    <div class="mt-5">{{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}</div>
                    <form method="POST" action="{{ route('peserta_tes.access', $tes->id) }}" class="form-inline mt-4 justify-content-center">
                        @csrf
                        <input type="hidden" name="vw" id="vw">
                        <div class="input-group mb-0">
                            <button class="btn btn-primary" type="submit">Mulai Tes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    var vw = window.innerWidth;
    document.getElementById('vw').value = vw;
</script>
@endpush
