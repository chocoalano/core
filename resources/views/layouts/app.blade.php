<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Template') }}</title>
    <!-- css starter -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    @yield('css')
    <!-- css ended -->

</head>
<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">
      @include('layouts.navbar')
        <div class="content-wrapper">
              @yield('content')
        </div>
        <!-- Control Sidebar -->
        @include('layouts.aside')
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
          <div class="float-right d-none d-sm-inline">
            Alpha versions
          </div>
          <strong>Copyright &copy; 2014-2020 ALDEV.</strong> All rights reserved.
        </footer>
    </div>
    <!-- js starter -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @yield('js')
    <!-- js ended -->
</body>
</html>
