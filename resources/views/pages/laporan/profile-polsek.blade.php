@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Satuan Kerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Satuan Kerja</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/presisi.png') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->nama }}</h3>

                            <p class="text-muted text-center">{{ $user->role->nama }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Berkas Dimasukkan</b> <a class="float-right">{{ $user->berkas->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Berkas Valid</b> <a
                                        class="float-right">{{ $user->berkas->where('status', 'Valid')->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Berkas Tidak Valid</b> <a
                                        class="float-right">{{ $user->berkas->where('status', 'Tidak Valid')->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total Berkas Terlambat</b> <a
                                        class="float-right">{{ $user->berkas->where('status', 'Terlambat')->count() }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    {{-- <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                                enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div> --}}
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Activity</a></li>

                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    @foreach ($berkas as $b)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('template') }}/dist/img/user1-128x128.jpg"
                                                    alt="user image">
                                                <span class="username">
                                                    <a href="#"> {{ $b->user->nama }}</a>
                                                    <a href="#" class="float-right btn-tool">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </span>
                                                <span class="description">Dibuat - {{ $b->created_at }}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Anda baru saja mengupload berkas pelaporan dengan nomor
                                                <span class="text-info text-bold">{{ $b->kode_berkas }}</span>
                                            </p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <embed src="{{ asset('storage/berkas/' . $b->file) }}" width="100%"
                                                        height="600px" type="application/pdf">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /.post -->
                                </div>
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{ route('update.profile.polsek', $user->id) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control bg-secondary text-secondary"
                                                    id="nama" name="nama" value="{{ $user->nama }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control bg-secondary text-secondary"
                                                    id="email" name="email" value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    id="new_password" name="new_password" placeholder="Password">
                                                @error('new_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_password_confirmation" class="col-sm-2 col-form-label">
                                                Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control"
                                                    id="new_password_confirmation" name="new_password_confirmation"
                                                    placeholder="Konfirmasi Password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
