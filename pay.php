<?php

include"conn.php";
//$ref=rand(100000, 999999);
if (isset($_POST['submit'])) {
  # code...
  //$matric= $_POST['matric'];
  //$ref_no=$_POST['ref_no'];
  $sql="SELECT * FROM oye_hall WHERE phone='".$_POST["phone"]."'";
  $result=$conn->query($sql);
  $row=$result->fetch_array(MYSQLI_ASSOC);
  if ($row) {
    # code...
    session_start();
    $_SESSION['id'] = $_POST['phone'];
    header("Refresh: 0; URL=payment.php");
  }else{
    $sql1= "SELECT * FROM ikole_hall WHERE phone='".$_POST["phone"]."'";
  $result=$conn->query($sql1);
  $row=$result->fetch_array(MYSQLI_ASSOC);
  if ($row) {
    # code...
    session_start();
    $_SESSION['id'] = $_POST['phone'];
    header("Refresh: 0; URL=payment.php");
  }else{
    echo "<script>alert('Record not found');</script>";
  
  echo "<script>window.open('../index.php', '_self');</script>";
}
  }
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style type="text/css">
    body{
      font-family: ;
      background-color: ;
    }
    .all{
      margin: auto;
      padding: 20px 20px;
      max-width: 600px;
      border: none;
      border-radius: 20px;
      background-color: white;
   
    }
    .column {
  float: left;
  width: 33.33%;
  
  
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
input[type=text], input[type=date], input[type=email]{
      width: 100%;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 5px solid black;
      outline: none;
      font-size: 16px;
      margin-bottom: 10px;
    }
    select{
      width: 100%;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 5px solid black;
      outline: none;
    
      font-size: 16px;
      margin-bottom: 10px;
    }
    hr.new1 {
  border-top: 5px solid black;
}

 .navbar{
  background-color: green;
}
label{
  font-size: 18px;
  font-family: cursive;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top navbar">
  <div class="container-fluids">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href=""><img src="web/fuoye.jpg" width="50" height="50"></a></li>
        <li><a href="../index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">FEDERAL UNIVERSITY, OYE-EKITI</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li class=""><a href="receipt.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT RECEIPT</a></li>
        <li class=""><a href="print.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT FORM</a></li>
        <li><a href="track.php" class="" style="border-left: px solid white; margin-top: 15px; color: white">MAKE PAYMENT</a></li-->
      </ul>
    </div>
  </div>
</nav><br><br><br><br>
<div class="all">

  <p style="text-align: center; font-size: 22px; font-weight: bolder; color: red;">PROCEED TO MAKE PAYMENT &nbsp;&nbsp;</p>
  <hr class="new1"><br>

<form method="post">
 
  <div class="form-group">
    <label>PHONE NUMBER:</label>
    <input type="text" name="phone" class="" placeholder="Enter your phone number here" required="">
  </div>
 
    <input type="submit" name="submit" value="Proceed" class="btn btn-info" style="width: 100%; margin-top: 2%;">
</form>
</div>
</body>
</html>