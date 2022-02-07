@extends('layouts.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Nilai Tes</h4>
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
                    <a href="#">Nilai</a>
                </li>
            </ul>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Detail Nilai Tes {{$peserta->nama}}
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
                                <th>Judul</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaiTes as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->tes->judul }}</td>
                                <td>
                                    {{ $row ? \Carbon\Carbon::parse($row->waktu_mulai)->isoFormat('dddd, DD MMMM  YYYY HH:mm') : '-' }}
                                </td>
                                <td>
                                    {{ $row ? ( $row->waktu_selesai == null ? 'Sedang Mengerjakan' : \Carbon\Carbon::parse($row->waktu_selesai)->isoFormat('dddd, DD MMMM YYYY HH:mm')) : '-' }}
                                </td>
                                <td>
                                    @if ($row)
                                        @if ($row->waktu_selesai == null)
                                            Sedang Mengerjakan
                                        @elseif ($row->waktu_selesai && $row->nilai >= 0)
                                            {!! $row->nilai ?? '<span class="badge badge-primary">Belum Dinilai</span>' !!}
                                        @endif
                                    @else
                                        Belum Mengerjakan
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline d-flex">
                                        @if($row)
                                            <a href="{{route('nilai_tes.detail_pengerjaan',[$row->tes_id,$row->id])}}" class="btn btn-icon btn-round btn-primary btn-sm {{$row->waktu_selesai == null ? 'd-none' : '' }}"><i class="fas fa-eye mt-2"></i></a>
    
                                            <button class="btn btn-icon btn-round btn-sm btn-danger ml-1" data-toggle="modal" data-target="#confirmDelete" data-url="{{ route('nilai_tes.nilai_delete', $row->id) }}" title="Hapus"><i class="fa fa-trash"></i></button>
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
</script>
@endpush
