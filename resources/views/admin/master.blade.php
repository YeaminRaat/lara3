<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">--}}
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
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

<!-- jQuery -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('admin/js')}}/jquery.dataTables.js"></script>
<script src="{{asset('admin/js')}}/dataTables.bootstrap4.js"></script>
{{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
