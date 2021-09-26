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
  ?> 
  <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT * FROM biodata WHERE status='0' order by id asc")or die(mysqli_error($conn));
        $id_count=mysqli_num_rows($sql);
        if($id_count!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT * FROM biodata WHERE status='1' order by id asc")or die(mysqli_error($conn));
        $id_count1=mysqli_num_rows($sql);
        if($id_count1!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?>
      <?php $total= $id_count + $id_count1; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
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

    <a class="navbar-brand mr-1" href="dashboard.php">ADMIN SECTION</a>

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
          <h6 class="dropdown-header"></h6>
          <a class="dropdown-item" href="dashboard.php">Home</a>
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
            <a href="" style="text-decoration: none;">Approved request</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <li class="breadcrumb-item"><?php echo date("Y-m-d")?></li>
        </ol>
          <div class="row">
          <div class="col-xl-6 col-sm-6 col-xs-12 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5 text-center"><?php echo "$id_count"?></div>
              </div>
              <a class="card-footer text-white text-center clearfix small z-1" href="#">
                <span class="">Pending List</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6 col-xs-12 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5 text-center"><?php echo "$id_count1"?></div>
              </div>
              <a class="card-footer text-white text-center clearfix small z-1" href="approved.php">
                <span class="">Approved List</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
          <div class="row">
          <div class="col-xl-12 col-sm-6 col-xs-12 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5 text-center text-center"><?php echo "$total"?></div>
              </div>
              <a class="card-footer text-white text-center clearfix small z-1" href="#">
                <span class="">Total request in the hall</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            List of approved request</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID NO.</th>
                    <th>NAME</th>
                    <th>DEPARTMENT</th>
                    <th>DATE </th>
                    <th style="text-align: center;">ACTION</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID NO.</th>
                    <th>NAME</th>
                    <th>DEPARTMENT</th>
                    <th>DATE </th>
                    <th style="text-align: center;">ACTION</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php include "conn.php";

                $sql="SELECT * FROM biodata WHERE status = '0'";
                if($result=$conn->query($sql)){
                  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                    # code...


          ?>
            <tr>
              
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['surname']; echo' '; echo $row['othername']; ?></td>
              <td><?php echo $row['department']; ?></td>
              
              <td><?php echo $row['date_apply']; ?></td>
              <td style="text-align: center;"><a href="view_unapproved.php?edit=<?php echo $row['id'];?>" class="btn btn-info" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view details"><i class="fa fa-edit"></i></a>  <a href="approve_biodata.php?edit=<?php echo $row['id'];?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Allocate room"><i class="fa fa-plus"></i></a> 
       
          
            
            </tr>
             <?php }}?>
 
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
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

</body>

</html>
