@extends('layouts.layout')

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Halo {{Auth::guard(session()->get('role'))->user()->nama}}</h5>
                </div>
            </div>
        </div>
    </div>
    @if(session()->get('role') == 'admin')
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Grafik Pendaftar</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <div id="echarts" style="height: 800px"></div>	 
                                </center>               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(session()->get('role') == 'panitia')
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">User Statistics</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <div id="echarts" style="height: 800px"></div>	 
                                </center>               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Data Profil</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php 
                            $profil = App\Models\Profil::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
                        ?>
                        @if($profil != null )
                        <h4>Data profil anda <span class="text-success">Sudah Lengkap</span></h4>
                        @else
                        <h4>Data profil anda <span class="text-danger">Belum Lengkap</span>. Silahkan isi melalui menu disamping</h4> 
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Data Tes</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php 
                            $nilaiTes = App\Models\NilaiTes::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
                        ?>
                        @if($nilaiTes != null )
                        <h4>Data tes anda <span class="text-success">Sudah Lengkap</span>. Silahkan cek menu Tes disamping untuk detail selengkapnya</h4>
                        @else
                        <h4>Data tes anda <span class="text-danger">Belum Lengkap</span>. Silahkan kerjakan melalui menu disamping</h4> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Surat Pernyataan</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php 
                            $pernyataan = App\Models\Pernyataan::where('peserta_id', auth()->guard(session()->get('role'))->user()->id)->first();
                        ?>
                        @if($pernyataan != null )
                        <h4>Selamat, Surat pernyataan anda <span class="text-success">Sudah Lengkap</span></h4>
                        @else
                        <h4>Surat pernyataan anda <span class="text-danger">Belum Lengkap</span>. Silahkan tanda tangan melalui menu disamping</h4> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.0/echarts.min.js" integrity="sha512-dvHO84j/D1YX7AWkAPC/qwRTfEgWRHhI3n7J5EAqMwm4r426sTkcOs6OmqCtmkg0QXNKtiFa67Tp77JWCRRINg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('echarts'), 'light');

	var option = {
        tooltip: {
	        trigger: 'axis',
	        axisPointer: {
	            type: 'none'
	        }
	    },
        xAxis: {
            type: 'category',
            data: <?php echo $data_x ?>
        },
        yAxis: {
            type: 'value'
        },
        grid: {
	        containLabel: false
	    },	
        series: [
            {
            data: <?php echo $data_y ?>,
            type: 'bar',
            
            }
        ]
	};

    // use configuration item and data specified to show chart
    myChart.setOption(option);
</script>

@endpush
