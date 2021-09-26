<?php
session_start();
    include"../conn2.php";
    if(!isset($_SESSION["admin"])) 
    {
        session_unset();
        session_destroy();
        header ("location:../index.php");

    } 

    if(isset($_SESSION["admin"])) 
    {
        $sql = "SELECT  * FROM admin  WHERE  password='".$_SESSION["admin"]."' ;";
        //  $row = mysql_fetch_array(mysql_query($sql));
        if ($result = $conn->query($sql)) 
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $name = $row['name'];
        }
        
    }
?> 
   
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-plus"></i>
                <span class="badge navbar-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               
                <a href="" class="dropdown-item dropdown-footer">Logout</a>
                </div>
            </li>
           
          
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="../pg.jpg" alt="PGC Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">PGC</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!--div class="image">
                <img src="" class="brand-image img-circle elevation-3" alt="User Image">
                </div-->
                <div class="info">
                <a href="#" class="d-block"><i class="fa fa-circle text-success"></i> <?php echo $name?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                        </a>
                    </li>
                    </ul>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="dispatch.php" class="nav-link">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>Dispatch</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="track.php" class="nav-link">
                        <i class="fas fa-comment nav-icon"></i>
                        <p>Track Request</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                        <i class="fas fa-power-off nav-icon"></i>
                        <p>Logout</p>
                        </a>
                    </li>

                    </ul>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                <a href="index.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button class="btn btn-success" onclick="window.print();">print</button></li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <?php
                $appno = base64_decode($_GET["edit"]);
            ?>
         <img id="myImg" src="http://pgcollegeui.com/transcript/notification_doc/<?php echo $appno ?>" width="100%" height="100%" alt="copy of notification result">
          
          </div><br><br><br>
           
        </div>


       

        <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
        <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
