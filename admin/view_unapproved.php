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
    $sql = "SELECT * FROM biodata WHERE id=".$_GET['edit']." LIMIT 1;";
if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $form_no=$row['form_no'];     
    $id=$row['id'];
  }}
?>
<!DOCTYPE html>
<html>
<head>
     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title></title>
    <style type="text/css">
         .all{
        max-width: 700px;
        margin: auto;
          } 
          p{
            text-align: center;
          }  
          h4{
            color: tan;
          }
        * {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
  
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
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
        <li class="">  <a href="request.php" class="btn btn-info btn-lg" style="color: white">back</a></li>
       <!--p style="color: white; padding-top: 15px;">Welcome : <?php echo "$matric";?></p--> 
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li> <button class="btn btn-success btn-lg" onclick="window.print();">print</button></li>
      </ul>
    </div>
  </div>
</nav><br><br>
<div class="all">
<div class="row">
  <div class="column">
    <img src="../polylogo.jpg" width="200" height="200">
  </div>
  <div class="column">
    <h5 style="color: black; font-weight: bolder;font-size: 16px;">THE POLYTECHNIC,IBADAN</h5>
    <h6 style="color: white; background-color: black; border:2px solid black;text-align: center;font-weight: bolder; line-height: 25.8px; font-family: algeria">OLORI HALL OF RESIDENCE</h6>
    <h6 style="text-align: center; color: orange;">ROOM  ALLOCATION FORM</h6> <br><br><br><br>
  </div>
  <div class="column">
    <div style="border: px solid black;  padding-bottom: 100px; margin-bottom: 50px;margin-top: 20px; margin-left: 40px;">
    <img src="../uploads/<?php echo $row['img']?>" width="150" height="140" >
</div>

 <b><u>Form No :&nbsp;&nbsp;Hall/2019/20/<?php echo "$form_no"?>&nbsp;&nbsp;</u></b><br><br>
</div>
  </div>
</div>
<!--div class="column side2">
    <img src="" height="200" width="200" align="right" style="margin-right: 10px">
</div>

<div>
    <form>
<p style="text-align: right;margin-right: 57px;font-family: arial;">Form no:<input type="value" name="form no"><br><br></p>
    </form>
</div-->
<div class="all">
         <ol>
              <li><b>Name (SURNAME FIRST) : </b> <?php echo $row['surname']; echo ' '; echo $row['othername']?></li><br>
              <li><b>Department :</b> <?php echo $row['department']?></li><br>
              <li><b>Level : </b> <?php echo $row['degree']?></li><br>
              <li><b>Date of Birth :</b> <?php echo $row['dob']?></li><br>
              <li><b>Marital Status :</b> <?php echo $row['m_status']?></li><br>
              <li><b>Religion :</b> <?php echo $row['religion']?></li><br>
              <li><b>Telephone :</b> <?php echo $row['phone']?></li><br>
              <li><b>Have you stayed in hostel before?</b> <?php echo $row['active_student']?></li><br>
              <li><b>Parent/Guardian/Telephone Number :</b> <?php echo $row['parent']?></li><br>
              <li><b>Any form of disability?</b> <?php echo $row['dissability']?></li><br>
              <li><b>If yes, State:</b> <?php echo $row['form']?></li><br>
              <!--li><b>Warden's Remark:</b>........................................................................................................................................</li-->
        </ol>
        <!--p style="font-size: 16px; font-weight: bolder; padding-top: 20px;">The Warden reserves the right to allocate students to any available block or room.</p>
        <p style="text-align: center; margin-top: 20px;"><?php echo "$id";?></p-->
</div>
</body>
</html>
