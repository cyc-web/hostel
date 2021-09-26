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
    $sql = "SELECT * FROM biodata WHERE id=".$_GET['edit'].";";
     $conn->query($sql) or die($conn->error);

  
?>
<?php include"conn.php";
 if (isset($_POST['update'])) {
   # code...
  $sql="SELECT * FROM biodata WHERE id='".$_POST["form_no"]."'";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
      # code...
      $form_no=$_POST['form_no'];
     $surname =$_POST['surname'];
     $othername =$_POST['othername'];
     $department =$_POST['department'];
     $degree =$_POST['degree'];
     $dob =$_POST['dob'];
     $m_status =$_POST['m_status'];
     $religion =$_POST['religion'];
     $phone =$_POST['phone'];
     $active_student =$_POST['active_student'];
     $parent =$_POST['parent'];
     $dissability =$_POST['dissability'];
     $form =$_POST['form'];
  $sql="UPDATE biodata SET surname='$surname', othername='$othername', department='$department', degree='$degree', dob='$dob', m_status='$m_status', religion='$religion', phone='$phone', active_student='$active_student', parent='$parent', dissability='$dissability', form='$form', updated_time=now() WHERE id='$form_no'";
  $conn->query($sql);
    echo "<script>alert('Record successfully updated');</script>";
    echo "<script>window.open('approved.php', '_self');</script>";

 }
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
    input[type=text],input[type=date]{
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
          <a class="dropdown-item" href="dashboard.php">Home</a>
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
<div style="max-width: 500px; margin: auto;">
    <!--h2 style="font-size: ; color: #000;">ADD STUDENT</h2-->

   <form method="POST" action="">
    
    <?php include"conn.php";
      

        $sql="SELECT * FROM biodata WHERE id=".$_GET['edit'].";";
        if ($result=$conn->query($sql)) {
          # code...
          while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
            # code...
          
      ?>
      
    <label>SERIAL NO.</label>
      <input type="text" value="<?php echo $row['id']; ?>" name="form_no" class="" placeholder="" readonly="">
      <label>SURNAME</label>
      <input type="text" value="<?php echo $row['surname']; ?>" name="surname" class="" placeholder="" required="">
      <label>OTHERNAMES</label>
      <input type="text" value="<?php echo $row['othername']; ?>" name="othername" class="" placeholder="" required="">
      <label>DEPARTMENT</label>
      <input type="text" value="<?php echo $row['department']; ?>" name="department" class="" placeholder="" required="">
      <label>LEVEL</label>
      <input type="text" value="<?php echo $row['degree']; ?>" name="degree" class="" placeholder="" required="">
      <label>DATE OF BIRTH (yyyy/mm/dd)</label>
      <input type="date" value="<?php echo $row['dob']; ?>" name="dob" class="" placeholder="">
      <label>MARITAL STATUS</label>
      <input type="text" value="<?php echo $row['m_status']; ?>" name="m_status" class="" placeholder="" required="">
      <label>RELIGION</label>
      <input type="text" value="<?php echo $row['religion']; ?>" name="religion" class="" placeholder="" required="">
      <label>TELEPHONE</label>
      <input type="text" value="<?php echo $row['phone']; ?>" name="phone" class="" placeholder="" required="">
      <label>HAVE YOU EVER STAY IN HOSTEL BEFORE?</label>
      <input type="text" value="<?php echo $row['active_student']; ?>" name="active_student" class="" placeholder="" required="">
      <label>PARENT / GUARDIAN'S PHONE</label>
      <input type="text" value="<?php echo $row['parent']; ?>" name="parent" class="" placeholder="" required="">
      <label>DISSABILITY</label>
      <input type="text" value="<?php echo $row['dissability']; ?>" name="dissability" class="" placeholder="" required="">
      <label>IF YES, STATE</label>
      <input type="text" value="<?php echo $row['form']; ?>" name="form" class="" placeholder="" >


   
   
     <button type="submit" class="btn btn-success btn-block" name="update" style="margin-bottom: 20px;">UPDATE STUDENT</button>
    </form>
    <?php }}?> 
  <?php }?>
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
