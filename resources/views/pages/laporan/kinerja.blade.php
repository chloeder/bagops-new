@extends('layouts.main')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($user as $u)
                    <div class="col-md-4">

                        <!-- Widget: user widget style 2 -->
                        <div class="card card-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-secondary">
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="{{ asset('img/presisi.png') }}"
                                        alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{ $u->satker->nama }}</h3>
                                {{-- <h5 class="widget-user-desc">{{ $s->user->nama }}</h5> --}}
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <span href="#" class="nav-link text-bold">
                                            Berkas Dimasukkan <span
                                                class="float-right badge bg-info">{{ $u->berkas->count() }} Berkas</span>
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <span href="#" class="nav-link text-bold">
                                            Berkas Valid <span
                                                class="float-right badge bg-success text-bold">{{ $u->berkas->where('status', 'Valid')->count() }}
                                                Berkas</span>
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <span href="#" class="nav-link text-bold">
                                            Berkas Terlambat <span
                                                class="float-right badge bg-warning">{{ $u->berkas->where('status', 'Terlambat')->count() }}
                                                Berkas</span>
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <span href="#" class="nav-link text-bold">
                                            Berkas Tidak Valid <span
                                                class="float-right badge bg-danger">{{ $u->berkas->where('status', 'Tidak Valid')->count() }}
                                                Berkas</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.widget-user -->

                        <!-- /.card -->
                    </div>
                @endforeach
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    {{-- Datatables --}}
    <script src="{{ asset('template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('template') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('template') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
