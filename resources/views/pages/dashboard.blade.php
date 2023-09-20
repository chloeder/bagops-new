@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Berkas</span>
                            <span class="info-box-number">
                                {{ $totalBerkas->count() }}
                                <small>Berkas</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-circle-xmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Berkas Tidak Valid</span>
                            <span class="info-box-number">
                                {{ $totalBerkas->where('status', 'Tidak Valid')->count() }}
                                <small>Berkas</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-circle-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Berkas Valid</span>
                            <span class="info-box-number">
                                {{ $totalBerkas->where('status', 'Valid')->count() }}
                                <small>Berkas</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i
                                class="fas fa-file-circle-exclamation"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Berkas Terlambat</span>
                            <span class="info-box-number">{{ $totalBerkas->where('status', 'Terlambat')->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Laporan Tahunan</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">


                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="lineChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Jumlah Berkas</strong>
                                    </p>
                                    <div class="progress-group">
                                        Berkas Masuk
                                        <span class="float-right"><b>{{ $totalBerkas->count() }}</b>/500</span>
                                        <div class="progress progress-sm">
                                            @if ($totalBerkas->count() == 0)
                                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                                            @elseif ($totalBerkas->count() < 10)
                                                <div class="progress-bar bg-primary" style="width: 5%"></div>
                                            @elseif($totalBerkas->count() < 50)
                                                <div class="progress-bar bg-primary" style="width: 10%"></div>
                                            @elseif($totalBerkas->count() < 100)
                                                <div class="progress-bar bg-primary" style="width: 20%"></div>
                                            @elseif($totalBerkas->count() < 200)
                                                <div class="progress-bar bg-primary" style="width: 40%"></div>
                                            @elseif($totalBerkas->count() < 300)
                                                <div class="progress-bar bg-primary" style="width: 60%"></div>
                                            @elseif($totalBerkas->count() < 400)
                                                <div class="progress-bar bg-primary" style="width: 80%"></div>
                                            @else
                                                <div class="progress-bar bg-primary" style="width: 100%"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->

                                    <div class="progress-group">
                                        Berkas Tidak Valid
                                        <span
                                            class="float-right"><b>{{ $totalBerkas->where('status', 'Tidak Valid')->count() }}</b>/100</span>
                                        <div class="progress progress-sm">
                                            @if ($totalBerkas->where('status', 'Tidak Valid')->count() == 0)
                                                <div class="progress-bar bg-danger" style="width: 0%"></div>
                                            @elseif ($totalBerkas->where('status', 'Tidak Valid')->count() < 10)
                                                <div class="progress-bar bg-danger" style="width: 5%"></div>
                                            @elseif($totalBerkas->where('status', 'Tidak Valid')->count() < 50)
                                                <div class="progress-bar bg-danger" style="width: 10%"></div>
                                            @elseif($totalBerkas->where('status', 'Tidak Valid')->count() < 100)
                                                <div class="progress-bar bg-danger" style="width: 20%"></div>
                                            @elseif($totalBerkas->where('status', 'Tidak Valid')->count() < 200)
                                                <div class="progress-bar bg-danger" style="width: 40%"></div>
                                            @elseif($totalBerkas->where('status', 'Tidak Valid')->count() < 300)
                                                <div class="progress-bar bg-danger" style="width: 60%"></div>
                                            @elseif($totalBerkas->where('status', 'Tidak Valid')->count() < 400)
                                                <div class="progress-bar bg-danger" style="width: 80%"></div>
                                            @else
                                                <div class="progress-bar bg-danger" style="width: 100%"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Berkas Valid</span>
                                        <span
                                            class="float-right"><b>{{ $totalBerkas->where('status', 'Valid')->count() }}</b>/500
                                        </span>
                                        <div class="progress progress-sm">
                                            @if ($totalBerkas->where('status', 'Valid')->count() == 0)
                                                <div class="progress-bar bg-success" style="width: 0%"></div>
                                            @elseif ($totalBerkas->where('status', 'Valid')->count() < 10)
                                                <div class="progress-bar bg-success" style="width: 5%"></div>
                                            @elseif($totalBerkas->where('status', 'Valid')->count() < 50)
                                                <div class="progress-bar bg-success" style="width: 10%"></div>
                                            @elseif($totalBerkas->where('status', 'Valid')->count() < 100)
                                                <div class="progress-bar bg-success" style="width: 20%"></div>
                                            @elseif($totalBerkas->where('status', 'Valid')->count() < 200)
                                                <div class="progress-bar bg-success" style="width: 40%"></div>
                                            @elseif($totalBerkas->where('status', 'Valid')->count() < 300)
                                                <div class="progress-bar bg-success" style="width: 60%"></div>
                                            @elseif($totalBerkas->where('status', 'Valid')->count() < 400)
                                                <div class="progress-bar bg-success" style="width: 80%"></div>
                                            @else
                                                <div class="progress-bar bg-success" style="width: 100%"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Berkas Terlambat
                                        <span
                                            class="float-right"><b>{{ $totalBerkas->where('status', 'Terlambat')->count() }}</b>/100</span>
                                        <div class="progress progress-sm">
                                            @if ($totalBerkas->where('status', 'Terlambat')->count() == 0)
                                                <div class="progress-bar bg-warning" style="width: 0%"></div>
                                            @elseif ($totalBerkas->where('status', 'Terlambat')->count() < 10)
                                                <div class="progress-bar bg-warning" style="width: 5%"></div>
                                            @elseif($totalBerkas->where('status', 'Terlambat')->count() < 50)
                                                <div class="progress-bar bg-warning" style="width: 10%"></div>
                                            @elseif($totalBerkas->where('status', 'Terlambat')->count() < 100)
                                                <div class="progress-bar bg-warning" style="width: 20%"></div>
                                            @elseif($totalBerkas->where('status', 'Terlambat')->count() < 200)
                                                <div class="progress-bar bg-warning" style="width: 40%"></div>
                                            @elseif($totalBerkas->where('status', 'Terlambat')->count() < 300)
                                                <div class="progress-bar bg-warning" style="width: 60%"></div>
                                            @elseif($totalBerkas->where('status', 'Terlambat')->count() < 400)
                                                <div class="progress-bar bg-warning" style="width: 80%"></div>
                                            @else
                                                <div class="progress-bar bg-warning" style="width: 100%"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        {{-- <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success">
                                            <i class="fas fa-caret-up"></i>
                                            17%
                                        </span>
                                        <h5 class="description-header">{{ $totalBerkas->count() }} Berkas</h5>
                                        <span class="description-text">TOTAL BERKAS MASUK</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-warning">
                                            <i class="fas fa-caret-left"></i>
                                            0%
                                        </span>
                                        <h5 class="description-header">
                                            {{ $totalBerkas->where('status', 'Valid')->count() }} Berkas</h5>
                                        <span class="description-text">TOTAL BERKAS VALID</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                            20%</span>
                                        <h5 class="description-header">
                                            {{ $totalBerkas->where('status', 'Terlambat')->count() }} Berkas</h5>
                                        <span class="description-text">TOTAL BERKAS TERLAMBAT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-6">
                                    <div class="description-block">
                                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                            18%</span>
                                        <h5 class="description-header">
                                            {{ $totalBerkas->where('status', 'Tidak Valid')->count() }} Berkas</h5>
                                        <span class="description-text">TOTAL BERKAS TIDAK VALID</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div> --}}
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Berkas terbaru</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Nomor Berkas</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $h)
                                    <tr>
                                        <td>{{ $h->kode_berkas }}</td>
                                        <td>{{ $h->judul }}</td>
                                        <td>{{ $h->kategori->nama }}</td>
                                        <td>
                                            @if ($h->status == 'Diproses')
                                                <span class="badge badge-secondary">{{ $h->status }}</span>
                                            @elseif($h->status == 'Valid')
                                                <span class="badge badge-success">{{ $h->status }}</span>
                                            @elseif($h->status == 'Tidak Valid')
                                                <span class="badge badge-danger">{{ $h->status }}</span>
                                            @else
                                                <span class="badge badge-warning">{{ $h->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="{{ route('kategori.non.rutin') }}" class="btn btn-sm btn-secondary float-right ml-2">Lihat
                        Laporan Non Rutin</a>
                    <a href="{{ route('kategori.rutin') }}" class="btn btn-sm btn-info float-right ">Lihat Laporan
                        Rutin</a>
                </div>
                <!-- /.card-footer -->
            </div>

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var labels = {{ Js::from($labels) }};
        var data = {{ Js::from($data) }};
        console.log(data)
        var areaChartData = {
            labels: labels,
            datasets: [{
                label: 'Total Berkas',
                backgroundColor: '#fff',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: 5,
                pointColor: '#ffffff',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#ffffff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: data
            }, ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: true,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: true,
                    }
                }]
            }
        }
        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })
    </script>
@endpush
