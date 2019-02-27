<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$appName}} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('plugins/iCheck/flat/blue.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('plugins/datatables/dataTables.bootstrap4.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{url('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active{color:#fff;background-color: #dd4445!important;}
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user-o"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">User Information</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"><span><i class="fa fa-user-o"></i></span> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{url('/logout')}}" class="dropdown-item dropdown-footer"><span><i
                                    class="fa fa-sign-out"></i></span> Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <span class="brand-text font-weight-light"><b>{{$appName}}</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <i class="fa fa-2x fa-user-circle" style="color: #c2c7d0" alt="User Image"></i>
                </div>
                <div class="info">
                    <a href="#" class="d-block"><b>{{$auth->full_name}}</b></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{url('/dashboard')}}"
                           class="nav-link @if($url1 == '' || $url1 == 'dashboard') active @endif">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{url('/students')}}" class="nav-link @if($url1 == 'students') active @endif">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Students
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/students')}}" class="nav-link">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>Student List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/students/add')}}" class="nav-link">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>Student Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{url('/attendance')}}" class="nav-link @if($url1 == 'attendance') active @endif">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                Attendance
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/attendance/daily-reports')}}" class="nav-link">
                                    <i class="fa fa-clock-o nav-icon"></i>
                                    <p>Daily Reports</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/attendance/monthly-reports')}}" class="nav-link">
                                    <i class="fa fa-calendar-check-o nav-icon"></i>
                                    <p>Monthly Reports</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/sms/logs')}}" class="nav-link @if($url1 == 'sms') active @endif">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>SMS Reports</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/settings')}}" class="nav-link @if($url1 == 'settings') active @endif">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>Application Settings</p>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="dbnltd.com">DBN LTD</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>

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
        $('#attendances-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });

        $(".datepicker").datepicker({
            format : "yyyy-mm-dd"
        });

        $(".datepicker-month").datepicker({
            format : "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
        });

        $(".datepicker-time").timepicker();

        $(document).on('click', '.export', function(e){
            e.preventDefault();
            var mywindow = window.open('', 'printwindow');
            mywindow.document.write('<html><head><title>Pay Slip</title><link rel="stylesheet" type="text/css" href="/css/hrms.css" />');
            mywindow.document.write('</head><body>');
            mywindow.document.write(document.getElementById('attendances-table').innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.print();
        })
    });
</script>
</body>
</html>
