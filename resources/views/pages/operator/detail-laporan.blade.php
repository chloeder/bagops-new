@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kode Berkas : {{ $berkas->kode_berkas }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <button class="btn btn-info">
                                <a class="text-white" href="{{ route('dashboard') }}">Kembali</a>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Berkas</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Kode Berkas</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $berkas->kode_berkas }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Kategori Berkas</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $berkas->kategori->nama }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Tanggal Pelaksanaan</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{ $berkas->tanggal_laporan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Lampiran Berkas</h4>
                                <embed src="{{ asset('storage/berkas/' . $berkas->file) }}" type="application/pdf"
                                    width="100%" height="600px">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-file-signature"></i> {{ $berkas->judul }}</h3>
                        <p class="text-muted text-md">Deskripsi : {{ $berkas->keterangan }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Penginput :
                                <b class="d-block text-md">{{ $berkas->user->nama }}</b>
                            </p>
                            <p class="text-sm">Pemimpin Lapangan :
                                <b class="d-block text-md">{{ $berkas->pemimpin_lapangan }}</b>
                            </p>
                            <p class="text-sm">Status Berkas :
                                <b class="d-block text-md">
                                    @if ($berkas->status == 'Diproses')
                                        <span class="badge badge-secondary">{{ $berkas->status }}</span>
                                    @elseif($berkas->status == 'Valid')
                                        <span class="badge badge-success">{{ $berkas->status }}</span>
                                    @elseif($berkas->status == 'Tidak Valid')
                                        <span class="badge badge-danger">{{ $berkas->status }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $berkas->status }}</span>
                                    @endif
                                </b>
                            </p>
                            @if ($laporan == null)
                                <p class="text-sm">Pemeriksa Berkas :
                                    <b class="d-block text-md">Belum Diperiksa</b>
                                </p>
                            @else
                                <p class="text-sm">Pemeriksa Berkas :
                                    <b class="d-block text-md">{{ $laporan->user->nama }}</b>
                                </p>
                            @endif
                            <p class="text-sm">Tanggapan :
                                <b class="d-block text-md">
                                    @foreach ($berkas->laporan as $item)
                                        {{ $item->tanggapan }}
                                    @endforeach
                                </b>
                            </p>
                        </div>

                        <h5 class="mt-5 text-muted">Lampiran File</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                    {{ $berkas->file }}</a>
                            </li>
                        </ul>
                        {{-- <form action="{{ route('update.status.berkas', $berkas->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            @if ($berkas->status == 'Diproses')
                                <div class="form-group text-muted mt-5">
                                    <label for="tanggapan ">Tanggapan</label>
                                    <input type="text" id="tanggapan" name="tanggapan" class="form-control">
                                </div>

                                <div class="text-center mt-5 mb-3">
                                    <input type="submit" class="btn btn-sm btn-success" name="status" value="Valid">
                                    <input type="submit" class="btn btn-sm btn-danger" name="status" value="Tidak Valid">
                                    <input type="submit" class="btn btn-sm btn-warning" name="status" value="Terlambat">
                                </div>
                            @endif
                        </form> --}}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
