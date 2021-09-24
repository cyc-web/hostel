<?php
include"conn.php";
  session_start();
if(!isset($_SESSION["id"])) 
{
  header("Location:index.php");
session_unset();
session_destroy();
header ("location:index.php");

} 
//include "conn.php";

$query = "";
if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM admin  WHERE  password='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $section=$row['user_type'];
  ?> 
 
  <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK A' AND status='0'")or die(mysqli_error($conn));
        $a=mysqli_num_rows($sql);
        if($a!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK B' AND status='0'")or die(mysqli_error($conn));
        $b=mysqli_num_rows($sql);
        if($b!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK C' AND status='0'")or die(mysqli_error($conn));
        $c=mysqli_num_rows($sql);
        if($c!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK D' AND status='0'")or die(mysqli_error($conn));
        $d=mysqli_num_rows($sql);
        if($d!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK E' AND status='0'")or die(mysqli_error($conn));
        $e=mysqli_num_rows($sql);
        if($e!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK F' AND status='0'")or die(mysqli_error($conn));
        $f=mysqli_num_rows($sql);
        if($f!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT room, room_category FROM rooms WHERE room_category = 'BLOCK G' AND status='0'")or die(mysqli_error($conn));
        $g=mysqli_num_rows($sql);
        if($g!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
      $h = $a + $b + $c + $d + $e + $f + $g;
      ?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">Admin section</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!--h6 class="dropdown-header">Login Screens:</h6-->
          <a class="dropdown-item" href="a.php">Block A</a>
          <a class="dropdown-item" href="b.php">Block B</a>
          <a class="dropdown-item" href="c.php">Block C</a>
          <a class="dropdown-item" href="d.php">Block D</a>
          <a class="dropdown-item" href="e.php">Block E</a>
          <a class="dropdown-item" href="f.php">Block F</a>
          <a class="dropdown-item" href="g.php">Block G</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="approved.php">Approved rooms</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="request.php">Request</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="dissable.php">Dissability students</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="attendance.php">Attendance list</a>
          <a class="dropdown-item" href="reserved.php">Locked room</a>
          <a class="dropdown-item" href="refund.php">Download List</a>
          <div class="dropdown-divider"></div>
          <?php
            if ($section=='super') {
              # code...
            
          ?>
          <a class="dropdown-item" href="allocate.php">Allocate all</a>
          <a class="dropdown-item" href="../find.php">Search</a>
        <?php }?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          
        </div>
      </li>
      
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <li class="breadcrumb-item"><?php echo date("Y-m-d")?></li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$a"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="a.php">
                <span class="float-left">Available rooms in Block A</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$b"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="b.php">
                <span class="float-left">Available rooms in Block B</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$c"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="c.php">
                <span class="float-left">Available rooms in Block C</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
          <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$d"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="d.php">
                <span class="float-left">Available rooms in Block D</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$e"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="e.php">
                <span class="float-left">Available rooms in Block E</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$f"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="f.php">
                <span class="float-left">Available rooms in Block F</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5"><?php echo "$g"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="g.php">
                <span class="text-center">Available rooms in Block G</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5" style="text-align: center;font-size: 22px;"><?php echo "$h"?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#" style="text-align: center; font-size: 20px;">
                <span class="text-center">Available rooms in the hall</span>
                <span class="float-right">
                  <!--i class="fas fa-angle-right"></i-->
                </span>
              </a>
            </div>
          </div>

        


      </div>
            <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <a href="http://www.royalcode.com.ng" target="blank">Copyright © Royaltech <?php echo date("Y")?></span>          </div>

          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select <span class="alert alert-warning">"Logout"</span>to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data.addColumn('string', 'language');
        data.addColumn('number', 'Nos');
    for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
});

</script>
</body>

</html>
