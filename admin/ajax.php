<?php
session_start();
require_once"functions.php";


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
  $sql = "SELECT  * FROM users_table  WHERE  email='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $users=$row['name'];
    $role_id = $row['role_id'];


?>
        
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <title>Documents Management System</title>

    <!-- Styles -->
    <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
<script>
    function _(e){
        return document.getElementById(el);
    }

    function uploadFile(){
        var file = _("file1").files[0];
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("file1", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "file_upload.php");
        ajax.send(formdata);

    }
    function progressHandler(event){
        _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
    }
    function completeHandler(event){
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0;
    }
    function errorHandler(event){
        _("status").innerHTML = "Upload failed";
    }
    function abortHandler(event){
        _("status").innerHTML = "Upload aborted";
    }
</script>

<style>
.alert {
  padding: 10px;
  background-color: green;
  color: white;
  width: 100%;
}
.alert2 {
  padding: 10px;
  background-color: red;
  color: white;
  width: 100%;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: red;
}
</style>
</head>
<body>
    


    <body id="page-top" style="background-image: url('web/bg.png');">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#"><?php echo $users?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="all_message.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>All messages</span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Share with Deans</span></a>
      </li>
     <?php if ($role_id=='2') {
       # code...
     ?>
      <li class="nav-item">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="accessor.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Assessors</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="deans.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Deans</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add user</span></a>
      </li>
      <?php }?>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-power-off"></i>
          <span>Logout</span></a>
      </li>
      
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
       <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Documents</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
          <li class="breadcrumb-item"><?php echo date("Y-m-d")?></li>
        </ol>
             
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-folder"></i>
            Add Folder</div>
              <a href="dashboard.php" class="btn btn-primary" style="font-weight: bold; font-size: 20px; text-decoration: none;margin-left: 30px;margin-top: 2px; width: 80px;" title="back"><i class="fa fa-arrow-circle-left"></i></a>
          <div class="card-body">
     
  </div>
      <!--a href="candidates/<?php echo $success; ?>">Click here to download the passport folder</a-->
      <div style="max-width: 500px; border: 0px solid red; padding: 25px; background-color: white;">
                
                <div class="row">
                  <div class="col-md-12">
                    <div id="uploadStatus"></div>
                  </div>
                </div>
            <form method="POST" action="" enctype="multipart/form-data" id="upload_form">
              
              <div class="row">
                <div class="col-md-3 text-right">
                  <div class="form-group">
                    <label><b>Faculty</b></label>
                  </div>
                </div>
                <div class="col-md-9">
                  <select name="fac_id" class="form-control" autofocus="" required="">
                    <option value="" selected="selected"></option>
                    <?php include"conn.php";
                       $sql = "SELECT *FROM faculties order by faculty asc ";
                        if ($result = $conn->query($sql))
                         { while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                          { $c++;  extract($row)  ?>
                    <option value="<?php echo $id?>"><?php echo $faculty?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 text-right">
                  <div class="form-group">
                    <label><b>Folder Name:</b></label>
                  </div>
                </div>
                <div class="col-md-9">
                  <input type="" name="uploads" class="form-control" value="" autofocus="" required="" placeholder="Enter folder name">
                </div>
              </div>

              
                

               <div class="row">
                <div class="col-md-3 text-right">
                  <div class="form-group">
                    <label><b>File:</b></label>
                  </div>
                </div>
                <div class="col-md-9">
                    <input type="file" name="file1" id="file1" />                
                </div>
              </div>


              <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                  <button type="button" onclick="uploadFile()" class="btn btn-success"><i class="fa fa-upload"></i> Add </button>
                            
                  
                </div>
              </div>
              
                <div class="row">
                  <div class="col-md-12">
                   <progress id="progressBar" value="0" max="100" style="width:300px"></progress>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <h3 id="status"></h3>
                   <p id="loaded_n_total"></p>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>

               

        <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <a href="">Design by PGC</span>          </div>

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



  <!-- Bootstrap core JavaScript-->
  
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
 
    <!-- Scripts -->
</body>
</html>

