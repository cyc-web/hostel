<!--?php error_reporting(0);?-->
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

include "conn.php";

if(isset($_GET['edit']))
  {
    $sql = "SELECT * FROM biodata WHERE form_no=".$_GET['edit'].";";
     $conn->query($sql) or die($conn->error);
  }
?>

 
 <?php include"conn.php";
      

        $sql="SELECT * FROM rooms WHERE room_category='BLOCK A' AND status ='0'";
        if ($result=$conn->query($sql)) {
          # code...
         
          
      ?>
      <?php
if (isset($_GET['update'])) {
  # code...
  $sql= "UPDATE rooms SET status='reserve' WHERE id=".$_GET['update']."";
  $conn->query($sql);
  echo "<script>alert('Room successfull reserved');</script>";
  echo "<script>window.open('a2.php', '_SELF')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  
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
    <style>
    input[type=text]{
      width: 500px;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 2px solid black;
      outline: none;
      font-size: 16px;
      margin-bottom: 10px;
    }
    select{
      width: 500px;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 2px solid black;
      outline: none;
    
      font-size: 16px;
      margin-bottom: 10px;
    }

  </style>

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
          <a class="dropdown-item" href="a.php">Home</a>
          <!--a class="dropdown-item" href="unapproved.php">Unapproved</a-->
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
            <a href="">Proceed</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <li class="breadcrumb-item "><?php echo date("Y-m-d")?></li>
        </ol>

      
    <div class="table-responsive">
      <form method="post" name="frmUser">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <th>&times</th>
                  <th>Action</th>
                  <th>room</th>
                  <th>Block</th>
                </thead>
                <tbody>
                  <?php include "conn.php";
      while($row = $result->fetch_array(MYSQLI_ASSOC)) {

  ?>
                  <td><input type="checkbox" name="rooms[]" value="<?php echo $row["id"]; ?>" ></td>
                  <td><a href="a2.php?update=<?php echo $row['id'];?>" class="btn btn-primary">Reserve</a></td> 
                  <td><?php echo $row["room"]; ?></td>
                  <td><?php echo $row["room_category"]; ?></td>
                </tbody>

    <?php }}?> 
    <tr class="listheader">
<td colspan="10" style="text-align: center;"><!--button type="button" name="update" class="btn btn-primary" value="Update" onClick="setUpdateAction();">update</button--> <button class="btn btn-info" name="update" onClick="setUpdateAction();">Reserve selected</button></td>
</tr>
</table>

</form>
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
  <script language="javascript" src="users.js" type="text/javascript"></script>

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
