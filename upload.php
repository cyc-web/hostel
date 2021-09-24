<?php error_reporting(0);?>
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:olori.php');
endif;
$id = $_SESSION['id'];
?>
<?php include"conn.php";

if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM biodata  WHERE  id='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $matric=$row['matric'];
    //$name=$row['name'];
      ?>

  
    
 <!DOCTYPE html>
    <html>
    <head>
      <title>Upload image</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <style type="text/css">
    .navbar{
      background-color: #000;
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
  </style>
</head>
<body style="background-color: ;">
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
       <!--p style="color: white; padding-top: 15px;">Welcome : <?php echo "$matric";?></p--> 
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php" style="border-left: 2px solid white; color: white;">Home</a></li>
      </ul>
    </div>
  </div>
</nav><br><br>



<div style="max-width: 500px; margin: auto;">
  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <span class="alert alert-danger"> Note: Only jpg is allowed and not more than 150kb in size</span><br><br><br>
      <label>Upload your passport</label><br>
      <input type="file" name="file" accept=".jpg">
    </div>
    <div class="form-group">
      <button class="btn btn-info" type="submit" name="submit">submit</button>
  </form>
  </div>
  <?php 
      if (isset($_POST['submit'])) {
        if ($_FILES["file"]["size"] > 150000) {
echo "<script>alert('File too large to upload, please reduce the size');</script>";
exit();
//echo "<script>window.open('dashboard.php');</script>";
    $uploadOk = 0;
}else{
    $temp = explode(".", $_FILES["file"]["name"]);

$newfilename = $form . '.' . end($temp);
  
move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
 }      
echo "<script>alert('Uploaded successfully');</script>";
echo "<script>window.open('message.php', '_self');</script>";
      }






  ?>
</body>