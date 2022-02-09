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
                    <a href="#">Detail</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Detail Nilai Tes
                    &nbsp;
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
                                <th>Nama</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->nama }}</td>
                                @php
                                    $nilaiTes = $row->nilaiTes()->where('tes_id', $tes->id)->first();
                                @endphp
                                <td>
                                    {{ $nilaiTes ? \Carbon\Carbon::parse($nilaiTes->waktu_mulai)->isoFormat('dddd, DD MMMM  YYYY HH:mm') : '-' }}
                                </td>
                                <td>
                                    {{ $nilaiTes ? ( $nilaiTes->waktu_selesai == null ? 'Sedang Mengerjakan' : \Carbon\Carbon::parse($nilaiTes->waktu_selesai)->isoFormat('dddd, DD MMMM YYYY HH:mm')) : '-' }}
                                </td>
                                <td>
                                    @if ($nilaiTes)
                                        @if ($nilaiTes->waktu_selesai == null)
                                            Sedang Mengerjakan
                                        @elseif ($nilaiTes->waktu_selesai && $nilaiTes->nilai >= 0)
                                            {!! $nilaiTes->nilai ?? '<span class="badge badge-primary">Belum Dinilai</span>' !!}
                                        @endif
                                    @else
                                        Belum Mengerjakan
                                    @endif
                                </td>
                                <td>{{$nilaiTes != null ? ($nilaiTes->status == 'Belum' ? 'Belum Ditentukan' : $nilaiTes->status) : '-' }}</td>
                                <td class="text-center">
                                    <div class="d-inline d-flex">
                                        @if($nilaiTes)
                                            <a href="{{route('nilai_tes.detail_pengerjaan',[$tes->id,$nilaiTes->id])}}" class="btn btn-icon btn-round btn-primary btn-sm {{$nilaiTes->waktu_selesai == null ? 'd-none' : '' }}"><i class="fas fa-eye mt-2"></i></a>
                                            <button title="Ubah" class="btn btn-icon btn-round btn-warning btn-sm ml-2" data-toggle="modal" data-target="#editNilai" data-id="{{ $nilaiTes->id }}" data-status="{{$nilaiTes->status}}">
                                                <i class="fa fa-pen-square"></i>
                                            </button>
                                            <button class="btn btn-icon btn-round btn-sm btn-danger ml-1" data-toggle="modal" data-target="#confirmDelete" data-url="{{ route('nilai_tes.nilai_delete', $nilaiTes->id) }}" title="Hapus"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </div>
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

<div class="modal fade" id="editNilai" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pendaftar.update_nilai_status') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Status Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status Nilai</label>
                        <select name="status" id="status" class="custom-select" required>
                            <option value="" disabled selected> Pilih Status </option>
                            <option value="lulus">Lulus</option>
                            <option value="remidi">Remidi</option>
                            <option value="gugur">Gugur</option>
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
                    <p>Apakah yakin Anda ingin menghapus nilai peserta ini?</p>
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
    $('#confirmDelete').on('show.bs.modal', (e) => {
        var url = $(e.relatedTarget).data('url');

        $(e.currentTarget).find('form').attr('action', url);
    });
    $('#editNilai').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('status');

        $('#editNilai').find('input[name="id"]').val(id);
        $('#editNilai').find('select[name="status"]').val(status);
    });
</script>
@endpush
