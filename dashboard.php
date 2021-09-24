<?php
session_start();
require_once"conn.php";
if (!isset($_SESSION['id'])) {
  # code...
  header('location: index.php');
  session_unset();
  session_destroy();
  header('location: index.php');
}
if (isset($_SESSION['id'])) {

  # code...
  $sql= "SELECT * FROM biodata where id='".$_SESSION["id"]."'";
  if ($result=$conn->query($sql)) {
    # code...
    $row= $result->fetch_array(MYSQLI_ASSOC);
    $form_no=$row['id'];
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
        <li><a href="logout.php" style="border-left: 2px solid white;">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
 <div class="" style="padding-top: 120px; max-width: 500px; margin: auto;">
  <form class="" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="username"><i class="fa fa-user"></i> Serial No.</label>
        <input type="text" class="form" id="username" value="<?php echo $row['id']?>" name="form_no" readonly="">
      </div>
      
    <div class="form-group">
      <label for="pwd"><i class="fa fa-file"></i> Passport:</label>
        <input type="file" class="form" id="pwd" name="file" required="">
      </div>
                              
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>
<?php 

      if (isset($_POST['submit'])) {
        if ($_FILES["file"]["size"] > 200000) {
echo "<script>alert('File too large to upload, please reduce the size');</script>";
exit();
//echo "<script>window.open('dashboard.php');</script>";
    $uploadOk = 0;
}else{
    $temp = explode(".", $_FILES["file"]["name"]);

$newfilename = $form_no . '.' . end($temp);
$sql="UPDATE biodata SET img ='$newfilename' Where id='$form_no'";
$conn->query($sql);
  
move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
 }      
echo "<script>alert('Uploaded successfully');</script>";
echo "<script>window.open('dashboard.php');</script>";
      }






  ?>
</body>
</html>