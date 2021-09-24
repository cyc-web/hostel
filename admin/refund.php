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
  <!--?php
include('conn.php');

        $sql=mysqli_query($conn, "SELECT * FROM biodata WHERE status='1' order by id asc")or die(mysqli_error($conn));
        $id_count=mysqli_num_rows($sql);
        if($id_count!=0)
        {
        //echo $id_count;
        }
        else {
            //echo "0" ;
        }
      ?-->
      
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
  <style>
    .size{
    width: 150px;
    border-radius: 5px;
    height: 40px;

  }

  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">ADMIN SECTION</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="post">
      <div class="input-group">
        <select name="cat" class="size">
           <option value="" selected="selected"></option>
            <?php include"conn.php";
    $sql = "SELECT room_category FROM rooms group by room_category asc ";
  if ($result = $conn->query($sql)) { while ($row = $result->fetch_array(MYSQLI_ASSOC)) { $c++;  extract($row)  ?>
            <option value="<?php echo $room_category?>"><?php echo $room_category?></option>
            <?php }}?>
          </select>
          <select name="degree" class="size" id="">
           <option value="" selected="selected"></option>
            <?php include"conn.php";
    $sql = "SELECT degree FROM biodata group by degree ";
  if ($result = $conn->query($sql)) { while ($row = $result->fetch_array(MYSQLI_ASSOC)) { $c++;  extract($row)  ?>
            <option value="<?php echo $degree?>"><?php echo $degree?></option>
            <?php }}?>
          </select>
              <button type="submit" name="search" class="btn btn-primary">Submit</button>

        
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
            <a href="" style="text-decoration: none;">Register</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <li class="breadcrumb-item"><?php echo date("Y-m-d")?></li>
        </ol>

        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Generate Report</div>
            <div class="container-fluid">
  
  <div class="row">
    <div class="btn-group pull-right" style=" padding: 10px; text-align: ;">
      <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     <span class="glyphicon glyphicon-th-list"></span> Download as
   
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                
                <li><a href="#" onclick="$('#employees').tableExport({type:'excel',escape:'false'});"> <img src="../images/xls.png" width="24px"> XLS</a></li>
                <li><a href="#" onclick="$('#employees').tableExport({type:'doc',escape:'false'});"> <img src="../images/word.png" width="24px"> Word</a></li>
                <!--li class="divider"></li>
                <li><a href="#" onclick="$('#employees').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li-->
                <li><a href="#" onclick="$('#employees').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="../images/pdf.png" width="24px"> PDF</a></li>
                
  </ul>
    </div>
  </div>
</div>
</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="employees" width="100%" cellspacing="0">
                <thead style="font-weight: bolder;">
            <tr>
      <!--th>Number</th-->
      
      <th>S/N</th>
      <th>Id</th>
      <th>Name</th>
      <th>Department/Class</th>
      
      <th>Degree</th>
      <th>PhoneNo</th>
      <th>Room</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $sn = 0;
  $d = "2020-03-12";
  $d2 = "2020-03-13";
  if (isset($_POST['search'])) {
    # code...
    //$room_category=$_POST['room_category'];
    $degree=$_POST['degree'];
    $cat = $_POST['cat'];

    $sql="SELECT * FROM rooms WHERE status = 'reserve' OR status='0' ";

        //$sql="SELECT * FROM biodata where department='$department' AND room_category='$room_category' order by department ";

        if ($result=$conn->query($sql)) {
          # code...
              while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    
    $id=$row['id'];
    //$surname=$row['surname'];
   // $othername=$row['othername'];
//$department=$row['department'];
   // $degree=$row['degree'];
    //$phone=$row['phone'];
    $cat=$row['room_category'];
    $room=$row['room'];
    //$time = $row['updated_time']
    ?>
    <tr>
      
      <td><?php echo ++$sn ?></td>
      <td><?php echo $row['room']?></td>
      <td><?php echo "$cat"?></td>
      <td><?php echo $row['status']?></td>
      <!--td><?php echo "$surname"?> <?php echo "$othername"?></td>
      <td><?php echo "$department"?></td>
      <td><?php echo "$degree"?></td>
      <td><?php echo "$phone"?></td>
      <td><?php echo "$room"?></td>
      <td><?php echo $time?></td-->
    </tr>
  <?php }}?>
<?php }?>
 
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
            <a href="http://www.royalcode.com.ng" target="blank">Copyright Royaltech 2019</a>
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
<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
  $('#employees').DataTable();
      }); 
</script>
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

  <script type="text/javascript" src="../tableExport.js"></script>
<script type="text/javascript" src="../jquery.base64.js"></script>
<script type="text/javascript" src="../html2canvas.js"></script>
<script type="text/javascript" src="../jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="../jspdf/jspdf.js"></script>
<script type="text/javascript" src="../jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</body>

</html>
