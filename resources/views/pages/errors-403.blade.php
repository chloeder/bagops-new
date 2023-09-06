<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | 404 Page not found</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="d-flex flex-column justify-content-center align-items-center text-center vh-100">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman Tidak Ditemukan.</h3>

            <p>
                Kami tidak bisa memuat halaman yang anda cari.
                Silahkan kembali ke <a href="{{ route('dashboard') }}">Halaman Dashboard</a>
            </p>

        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('template') }}/dist/js/demo.js"></script>
</body>

</html>
