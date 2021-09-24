 <?php error_reporting(0);?>
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
$id = $_SESSION['id'];
?>
<?php include"conn.php";

if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM oye_hall  WHERE  phone='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $phone=$row['phone'];
    //$name=$row['name'];
      ?>
<?php 
  if (isset($_POST['pay'])) {
    # code...
    $sql1="SELECT * FROM payment WHERE phone='".$_POST["phone"]."' AND status='unpaid'";
    $result=$conn->query($sql1);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
      # code...
      echo "<script>alert('You have an unpaid invoice');</script>";
    header("Refresh: 0; URL=proceed.php");
    }else{
    $email=$_POST['email'];
    $amount_charge=$_POST['amount_charge'];
    //$purpose=$_POST['purpose'];
    $rcode=rand(1000000,99999999);
    //$payment_time = date("h:i:s");
    //$payment_date =date("Y-m-d");
    $status=$_POST['status'];

    $sql="INSERT INTO payment (phone,email,amount_charge,ref_no,status,purpose)VALUES('$phone', '$email', '$amount_charge', '$rcode', 'unpaid', 'Allocation form fee')";
    $sql1="UPDATE olori SET ref_no=$rcode WHERE phone='".$_POST["phone"]."'";
    $conn->query($sql);
    $conn->query($sql1);
    echo "<script>alert('Payment details submited'); </script>";
    header("Refresh: 0; URL=proceed.php");
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
        <li><a href=""><img src="img/fuoye.jpg" width="50" height="50"></a></li>
        <li><a href="../index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">FEDERAL UNIVERSITY, OYE-EKITI</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li class=""><a href="receipt.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT RECEIPT</a></li>
        <li class=""><a href="print.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT FORM</a></li>
        <li><a href="track.php" class="" style="border-left: px solid white; margin-top: 15px; color: white">MAKE PAYMENT</a></li-->
      </ul>
    </div>
  </div>
</nav><br><br><br><br><br>
<div style="max-width: 500px;margin: auto;background-color: #fff;padding-bottom: 50px;">
  <!--p style="text-align: right;"><img height="100" class="img-circle"  width="100" src="uploads/<?php echo "$phone"; ?>.jpg">&nbsp;&nbsp;</p>
  <!--p style="text-align: right; font-size: 16px;"><a href="logout.php">Logout&nbsp;&nbsp;</a></p><br><br-->
    <p style="text-align: center; font-size: 22px; font-weight: bolder; color: red;">PROCEED TO MAKE PAYMENT &nbsp;&nbsp;</p>
     <hr class="new1"><br>

  <form method="POST" action="" enctype="multipart/form-data">
     <div class="form-group">
      <label>NAME </label>
      <input type="text" class="" value="<?php echo $row['surname'];?> <?php echo $row['othername'];?>" name="name" readonly="">
    </div>
    <div class="form-group">
      <label> EMAIL</label>
      <input type="text" class="" value="<?php echo $row['email'];?>" name="email" readonly="">
    </div>
    <div class="form-group">
      <label> PHONE NO.</label>
      <input type="text" class="" value="<?php echo $row['phone'];?>" name="phone" readonly="">
    </div>

    <div class="form-group">
      <label for="usr">&nbsp;PAYMENT TYPE:</label>
      <select name="amount_charge" class="" id="" required="">
           <option></option>
           <option value="1500">Allocation Form</option>
            <!--option value="20000">Hostel fee</option-->
          </select>
    </div>
    
    <button name="pay" type="submit" class="btn btn-info btn-block">SUBMIT</button>
  </form>
  
</div>
</body>


