<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        
        .loader {
            position: fixed;

            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url({{asset('images/Preloader_1.gif')}}) center no-repeat;
}
    </style>

    @stack('style')
</head>
<body class="hold-transition sidebar-mini" id="app">
<!-- Site wrapper -->
<div class="wrapper">
    <div class="loader" style="display: none;"></div>
    <!-- Navbar -->
    @include('admin.includes.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.includes.aside')

    <!-- Content Wrapper. Contains page content -->
    @yield('body')
    <!-- /.content-wrapper -->

    @include('admin.includes.footer')

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
@stack('script')
</body>
</html>
