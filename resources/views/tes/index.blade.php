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
                    <button title="Tambah" class="btn btn-icon btn-round btn-primary btn-sm" data-toggle="modal" data-target="#tambahTes">
                        <i class="fa fa-plus"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                @if( Session::get('success') !="")
                    <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
                @endif
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
                                <td class="text-danger">{{$row->status == 0 ? 'Belum Diterbitkan' : 'Sudah Diterbitkan'}}</td>
                                <td>{{$row->status_acak == 0 ? 'Tidak Diacak' : 'Diacak'}}</td>

                                <td>
                                    <button title="Ubah" class="btn btn-icon btn-round btn-warning btn-sm" data-toggle="modal" data-target="#editTes" data-id="{{ $row->id }}" data-judul="{{ $row->judul }}" data-sekolah_id="{{ $row->sekolah_id }}" data-durasi="{{ $row->durasi }}" data-status_acak="{{ $row->status_acak }}">
                                        <i class="fa fa-pen-square"></i>
                                    </button>

                                    <a href="{{route('tes.soal.index', $row->id)}}" title="Detail" class="btn btn-icon btn-round btn-primary btn-sm">
                                        <i class="fa fa-eye mt-2"></i>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahTes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('tes.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="sekolah_id">Sekolah</label>
                        <select name="sekolah_id" id="sekolah_id" class="custom-select" required>
                            <option value="" disabled selected>Pilih Sekolah</option>
                            @foreach($sekolah as $row)
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi(menit)</label>
                        <input type="number" class="form-control" id="durasi" name="durasi" required>
                    </div>
                    <div class="form-group">
                        <label for="status_acak">Status Acak</label>
                        <select name="status_acak" id="status_acak" class="custom-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="0">Soal Tidak Diacak</option>
                            <option value="1">Soal Diacak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editTes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('tes.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="sekolah_id">Sekolah</label>
                        <select name="sekolah_id" id="sekolah_id" class="custom-select" required>
                            <option value="" disabled selected>Pilih Sekolah</option>
                            @foreach($sekolah as $row)
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi(menit)</label>
                        <input type="number" class="form-control" id="durasi" name="durasi" required>
                    </div>
                    <div class="form-group">
                        <label for="status_acak">Status Acak</label>
                        <select name="status_acak" id="status_acak" class="custom-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="0">Soal Tidak Diacak</option>
                            <option value="1">Soal Diacak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#editTes').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var judul = $(e.relatedTarget).data('judul');
        var sekolahId = $(e.relatedTarget).data('sekolah_id');
        var durasi = $(e.relatedTarget).data('durasi');
        var statusAcak = $(e.relatedTarget).data('status_acak');

        $('#editTes').find('input[name="id"]').val(id);
        $('#editTes').find('input[name="judul"]').val(judul);
        $('#editTes').find('select[name="sekolah_id"]').val(sekolahId);
        $('#editTes').find('input[name="durasi"]').val(durasi);
        $('#editTes').find('select[name="status_acak"]').val(statusAcak);
    });
</script>
@endpush
