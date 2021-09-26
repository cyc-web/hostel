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
  }
?>


<?php include"conn.php";
 if (isset($_POST['update'])) {
   # code...
  $sql="SELECT * FROM biodata WHERE id='".$_POST["room"]."'";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
      # code...
     $id=$_POST['id'];
     $room=$_POST['room'];
     $room_category=$_POST['room_category'];
     $id=$_POST['id'];
  $sql="UPDATE biodata SET room='$id', room_category='$room_category', status='1', comments='' WHERE id='$room'";
    $sql1="UPDATE rooms SET status='1' WHERE id='$id'";
  $conn->query($sql);

  $conn->query($sql1);
    echo "<script>alert('biodata successfully approved');</script>";
    echo "<script>window.open('request.php', '_self');</script>";

 }
 }
 ?>
 <!--?php include"conn.php";
 if (isset($_POST['update'])) {
   # code...
  $sql="SELECT biodata.surname,biodata.othername,biodata.email,biodata.room_category, rooms.room FROM biodata inner join rooms on biodata.room=rooms.id WHERE biodata.id='".$_POST["room"]."'";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
 //$sql = "SELECT * FROM biodata WHERE id=".$_POST['id'].";";
     //$conn->query($sql) or die($conn->error);
     $emails=$row['email'];
     $room=$row['room'];
     $room_category=$row['room_category'];
     $user=$row['surname'];
     $user2=$row['othername'];
  }
  
      $subject = "Notification (Transcript Portal)";
//$emails=mysqli_real_escape_string($conn, $_POST['email']);
//$user=mysqli_real_escape_string($conn, $_POST['surname']);
//$user2=mysqli_real_escape_string($conn, $_POST['othernames']);
$email = htmlspecialchars($emails);
$message = "<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Transcript biodata Status</title>
</head>
<body style='font: 13px arial, helvetica, tahoma;'>
    <div class='email-container' style='width: 650px; border: 4px solid #eee;'>
        <div id='header' style='background-color: skyblue; border-bottom: 4px solid #000;
                height: 65px; padding: 10px 15px;'>
            <strong id='logo' style='color: navy; font-size: 20px;
                    text-shadow: 1px 1px 1px #8F8888; margin-top: px; display: inline-block'><img src='http://academic.ui.edu.ng/transcript/img/log2.jpg' style='height: 70px; margin-top: px;'> &nbsp;&nbsp;University of Ibadan, Ibadan Nigeria.
                    </strong>
        </div>
        <br>
        <br>
        <br>
        <br>
        

        <div id='content' style='padding: 10px 15px;'>
            <h2>Hello Dear <b style='text-transform:uppercase;'>".$user." ".$user2."</b></h2>
            This is to inform you that your request for a room has been approved! <br>
       <p></p>    
          <b>Your room number is ".$room." ".$room_category."</b>   
        </div>

        <div id='footer' style='padding: 10px; text-align: center; margin-top: 10px;
                border-top: 1px solid #EEE; background: #FAFAFA;'>
            Powered by
            <a href='#' style='text-decoration: none;'>University of Ibadan</a>
            
        </div>
    </div>
</body>
</html>
";

         //dont forget to include content-type on header if your sending html
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From: Transcript Portal | Online Transcript Portal <no-reply@ui.edu.ng>'."\r\n";
$to = $email;
mail($to,$subject,$message,$headers); 

?-->
<!--?php }?-->

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

    <a class="navbar-brand mr-1" href="request.php">Admin section</a>

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
        <a class="nav-link" href="request.php">
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
          <a class="dropdown-item" href="request.php">Home</a>
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
      
    <label>Serial NO.</label>
      <input type="text" value="<?php echo $row['id']; ?>" name="room" class="" placeholder="" readonly="">
   <br>


   <label>SELECT ROOM</label>
      
   <select name="id" required="">
    <option></option>
    <?php 
    include"conn.php";
    $sql=" SELECT * FROM rooms WHERE status='0' order by id";
    if ($result= $conn->query($sql)) {
      # code...
      while ($row= $result->fetch_array(MYSQLI_ASSOC)) {$c++; extract($row)
        # code...
    
    ?>
    
    <option value="<?php echo "$id" ?>"><?php echo "$room" ?></option>

     <?php }}?>
   </select>
   <label>SELECT BLOCK</label>
   <select name="room_category" required="">
    <option></option>
    <?php 
    include"conn.php";
    $sql=" SELECT room_category FROM rooms group by room_category";
    if ($result= $conn->query($sql)) {
      # code...
      while ($row= $result->fetch_array(MYSQLI_ASSOC)) {$c++; extract($row)
        # code...
    
    ?>
    
    <option value="<?php echo "$room_category" ?>"><?php echo "$room_category" ?></option>
     <?php }}?>
   </select>
     <button type="submit" class="btn btn-success btn-block" name="update" style="margin-bottom: 20px;">APPROVE STUDENT</button>
    </form>
    <?php }}?> 
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
