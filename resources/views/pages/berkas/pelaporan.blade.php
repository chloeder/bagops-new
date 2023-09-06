@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
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
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Judul Berkas
                            </th>
                            <th>
                                Penginput
                            </th>
                            <th>
                                Jenis Berkas
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Verifikasi
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($berkas->count() > 0)
                            @foreach ($berkas as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->user->nama }}</td>
                                    <td>{{ $b->kategori->nama }}</td>
                                    <td>
                                        @if ($b->status == 'Diproses')
                                            <span class="badge badge-secondary">{{ $b->status }}</span>
                                        @elseif($b->status == 'Valid')
                                            <span class="badge badge-success">{{ $b->status }}</span>
                                        @elseif($b->status == 'Tidak Valid')
                                            <span class="badge badge-danger">{{ $b->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $b->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('detail.berkas.pelaporan', $b->id) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                            Detail
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('edit.berkas.pelaporan', $b->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No data available in table</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
