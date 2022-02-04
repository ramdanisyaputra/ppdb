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
                    <div class="dropdown" style="float:right">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle text-light"><i class="fa fa-cog"></i> Pengaturan Tes</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li class="dropdown-item">
                                <a href="#" data-toggle="modal" data-target="#ujianKonfirmasiHapus">Hapus Penilaian Harian</a>
                            </li>
                            <li>
                                <form action="{{ route('tes.status', $tes->id) }}" method="POST" id="tesStatus">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $tes->id }}">
                                    <input type="hidden" name="status" value="{{ $tes->status == 0 ? 0 : 1 }}">
                                </form>
                                <a href="#" onclick="document.getElementById('tesStatus').submit()" class="dropdown-item">{{ $tes->status == 1 ? 'Turunkan Soal' : 'Terbitkan Soal' }}</a>
                            </li>
                        </ul>
                    </div>
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
                    <div class="dropdown" style="float:right">
                        <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm dropdown-toggle text-light"><i class="fa fa-cog"></i> Pengaturan Soal</a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li class="dropdown-item">
                                <a href="#" data-toggle="modal" data-target="#ujianKonfirmasiHapus">Lihat Tampilan Soal</a>
                            </li>
                            @if($tes->status == 0)
                            <li>
                                <a href="{{route('tes.soal.create', $tes->id)}}" class="dropdown-item">Buat soal</a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#confirmDeleteAll" class="dropdown-item text-danger">Hapus semua <i class="fa fa-exclamation-circle"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Opsi</th>
                                <th>Jawaban</th>
                                <th>Poin</th>
                                @if($tes->status != 1)
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soal_tes as $key => $soal)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div>
                                        {!! $soal->soal !!}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <ol type="A" class="pl-3 mt-2 mb-0">
                                            @foreach(json_decode($soal->opsi) as $opsi)
                                            <li>{!! $opsi !!}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </td>
                                <td>
                                    <div class="mt-2">
                                        {!! $soal->jawaban !!}
                                    </div>
                                </td>
                                <td>{{ $soal->poin ?? 'Belum Diterbitkan' }}</td>
                                @if (!$tes->status)
                                <td>
                                    <a href="{{route('tes.soal.edit', [$tes->id, $soal->id])}}" class="btn btn-sm btn-warning d-block w-100" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                    <button class="btn btn-sm btn-danger w-100 mt-2 d-block" data-toggle="modal" data-target="#confirmDelete" data-url="{{route('tes.soal.delete', [$tes->id, $soal->id])}}" title="Hapus"><i class="fa fa-trash"></i></button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteAll" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('tes.soal.deleteAll', $tes->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah yakin Anda ingin menghapus <strong>semua soal tes</strong> ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="ujianKonfirmasiHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('tes.delete', $tes->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah yakin Anda ingin menghapus tes ini ? tes yang dihapus tidak dapat dikembalikan!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah yakin Anda ingin menghapus soal ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    window.MathJax = {
        MathML: {
            extensions: ["mml3.js", "content-mathml.js"]
        }
    }
</script>
<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>

<script>
    $('#confirmDelete').on('show.bs.modal', (e) => {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('form').attr('action', url);
    });
</script>
@endpush
