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
include('conn.php');

        $sql=mysqli_query($conn, "SELECT * FROM rooms WHERE status='0' order by id asc")or die(mysqli_error($conn));
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
    require_once"conn.php";
    $sql="SELECT * FROM rooms WHERE status='0' ";
    $result=$conn->query($sql);
    
?>

<?php include"conn.php";
 if (isset($_POST['update'])) {
   # code...
  //$sql="SELECT * FROM biodata WHERE form_no='".$_POST["form_no"]."'";
    //$result=$conn->query($sql);
    //$row=$result->fetch_array(MYSQLI_ASSOC);
    //if ($row) {
      # code...
      $room=$_POST['room'];
      $room_category=$_POST['room_category'];
     $comments =$_POST['comments'];
     $status=$_POST['status'];
  $sql="UPDATE biodata SET room='$room', room_category='$room_category' WHERE room='' AND room_category='' AND status='$status' limit 1 ";
  //$sql1="UPDATE rooms SET status='$status' WHERE status!='$status'";
  $conn->query($sql);
  //$conn->query($sql1);
    echo "<script>alert('Record successfully updated');</script>";
    echo "<script>window.open('dashboard.php', '_self');</script>";

 //}
 ?>
 <?php include"conn.php";
 if (isset($_POST['update'])) {
   # code...
  $sql="SELECT * FROM biodata WHERE form_no='".$_POST["form_no"]."'";
    $result=$conn->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
 //$sql = "SELECT * FROM request WHERE matric=".$_POST['matric'].";";
     //$conn->query($sql) or die($conn->error);
     $emails=$row['email'];
     $ref=$row['ref'];
     $user=$row['surname'];
     $user2=$row['othernames'];
  }
  
      $subject = "Notification (Hall of residence)";
//$emails=mysqli_real_escape_string($conn, $_POST['email']);
//$user=mysqli_real_escape_string($conn, $_POST['surname']);
//$user2=mysqli_real_escape_string($conn, $_POST['othernames']);
$email = htmlspecialchars($emails);
$message = "<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <title>Hall status Status</title>
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
            Your transcript request status<br>
       <p></p>    
          <b>".$comments."</b>   
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

?>
<?php }}?>
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
          <a class="dropdown-item" href="dashboard.php">Home</a>
          <!--a class="dropdown-item" href="unapproved.php">Unapproved</a-->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          
        </div>
      </li>
      
    </ul>


    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12 col-sm-6 col-xs-12 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="mr-5 text-center"><?php echo "$id_count"?></div>
              </div>
              <a class="card-footer text-white text-center clearfix small z-1" href="#">
                <span class="">Available rooms</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="room.php">Click here after you have saved the downloaded file as csv(Comma delimited)</a>
          </li>
         
        </ol>

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
                <!--li><a href="#" onclick="$('#employees').tableExport({type:'doc',escape:'false'});"> <img src="../images/word.png" width="24px"> Word</a></li>
                <!--li class="divider"></li>
                <li><a href="#" onclick="$('#employees').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li-->
                <!--li><a href="#" onclick="$('#employees').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="../images/pdf.png" width="24px"> PDF</a></li-->
                
  </ul>
    </div>
  </div>
</div>
</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="employees" width="100%" cellspacing="0">
          
  <tbody>
    <?php
    while($row = mysqli_fetch_array($result)) {
      $id=$row['id'];
    $room=$row['room'];
    $room_category=$row['room_category'];
    ?>
    <tr>
      <td><?php echo "$id"?></td>
      <td><?php echo "$room"?></td>
      <td><?php echo "$room_category"?></td>
    </tr>
  <?php }?>
  </tbody>
  </table>
  
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
