<?php
include"conn.php";
if (isset($_POST['submit'])) {
  # code...
$email= $_POST['email'];
$password= md5($_POST['password']);

$sql= "SELECT * FROM admin WHERE email= '$email' AND password='$password' ";
$result= $conn->query($sql);
$row= $result->fetch_array(MYSQLI_ASSOC);
if ($row) {
  # code...
  session_start();
  $_SESSION['id']=$_POST['password'];
  header('location: dashboard.php');
  } else{
    echo "<script>alert('invalid username/passwordword');</script>";
  } 

}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Login Page</title>
   
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    body{
      background-color: #484848;
      font-family: cursive;
    }
    .all{
  max-width:400px;
  margin: auto;
  margin-top: 0%;
  background-color: white;
  padding: 20px 20px;
  border-radius: 15px;
}
  </style>
</head>
<body>
   <nav class="navbar navbar-inverse bar">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--li><a href="inndex.php">Home
          <img src="">
        </a></li-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
</nav>

<h3 style="text-align:  center; color: white; margin-top: 5%;">ADMIN LOGIN</h3>
<div class="all">
  <form method="post">
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="well well-md" placeholder="Email" required="" style="background-color:white; border:none; border-bottom: 2px solid #484848; width: 100%; box-shadow: none;">
    </div>
    <div class="form-group">
      <label>password</label>
      <input type="password" name="password" class="well well-md" placeholder="password" required="" style="background-color:white; border:none; border-bottom: 2px solid #484848; width: 100%; box-shadow: none;">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="width: 100%">
  </form>
</div>
</body>
</html>