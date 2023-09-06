@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Berkas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <button class="btn btn-info">
                                <a class="text-white" href="{{ route('berkas.pelaporan') }}">Kembali</a>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('update.berkas.pelaporan', $berkas->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Umum</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_berkas">Kode Berkas</label>
                                <input type="text" value="{{ $berkas->kode_berkas }}" id="kode_berkas" name="kode_berkas"
                                    class="form-control @error('kode_berkas') is-invalid @enderror">
                                @error('kode_berkas')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Berkas</label>
                                <input type="text" value="{{ $berkas->judul }}" id="judul" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Kegiatan</label>
                                <input type="text" value="{{ $berkas->lokasi }}" id="lokasi" name="lokasi"
                                    class="form-control @error('lokasi') is-invalid @enderror">
                                @error('lokasi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pemimpin_lapangan">Pemimpin Lapangan</label>
                                <input type="text" value="{{ $berkas->pemimpin_lapangan }}" id="pemimpin_lapangan"
                                    name="pemimpin_lapangan"
                                    class="form-control @error('pemimpin_lapangan') is-invalid @enderror">
                                @error('pemimpin_lapangan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Deskripsi Berkas</label>
                                <textarea id="keterangan" placeholder="{{ $berkas->keterangan }}" name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror" rows="4" disabled></textarea>
                                @error('keterangan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Detail</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool " data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <select class="form-control select2 @error('kategori_id') is-invalid @enderror"
                                    style="width: 100%;" name="kategori_id">
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control datetimepicker-input @error('tanggal_laporan') is-invalid @enderror"
                                        data-target="#reservationdate" name="tanggal_laporan"
                                        value="{{ $berkas->tanggal_laporan }}" />
                                    <div class="input-group-append" data-target="#reservationdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('tanggal_laporan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Files</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>File Size</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $berkas->file }}</td>
                                        <td>{{ $berkas->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <button type="submit" class="btn btn-success float-right">Update Berkas</button>
                </div>
            </div>


        </form>
    </section>
    <!-- /.content -->
    <!-- /.card -->
    <!-- /.card -->
@endsection
