<?php
include"conn.php";
if (isset($_POST['submit'])) {
  # code...
$id= $_POST['id'];
$password= $_POST['password'];

$sql= "SELECT * FROM biodata WHERE id= '$id' AND password='$password' ";
$result= $conn->query($sql);
$row= $result->fetch_array(MYSQLI_ASSOC);
if ($row) {
  # code...
  session_start();
  $_SESSION['id']=$_POST['id'];
  header('location: dashboard.php');
  } else{
    echo "<script>alert('invalid username/password');</script>";
  } 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <style type="text/css">
    .navbar{
      background-color: #000;
    }
    .form{
      border-bottom: 2px solid black;
      width: 100%;
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      height: 40px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--li class=""><a href="index.php" style="border-right: 2px solid white;">HOME</a></li-->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li><a href="signup.php" style="border-left: 2px solid white;">APPLY</a></li-->
      </ul>
    </div>
  </div>
</nav>
 <div class="" style="padding-top: 120px; max-width: 500px; margin: auto;">
  <form class="" action="" method="post">
    <div class="form-group">
      <label for="username"><i class="fa fa-user"></i> Serial No.</label>
        <input type="text" class="form" id="username" placeholder="Enter username..." name="id" required="">
      </div>
    <div class="form-group">
      <label for="pwd"><i class="fa fa-lock"></i> Password:</label>
        <input type="password" value="1234" class="form" id="pwd" placeholder="Enter password" name="password" readonly="">
      </div>
                              
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>
</body>
</html>