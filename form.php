<?php
    session_start();
 include ('conn.php');
 date_default_timezone_set('Africa/Lagos');
//$con = "reg/no/2019/";
$form_no =rand(100000, 999999);
  if (isset($_POST['submit'])) {
    # code...
    $form_no=$_POST['form_no'];

    $sql="INSERT INTO biodata (form_no,date_apply) VALUES ('$form_no', now())";
    $conn->query($sql);
    echo "<script>alert('submitted');</script>";
    echo "<script>window.open('form.php', '_self');</script>";
  }

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
<div class="all">
<div class="row">
  <div class="column">
    <img src="polylogo.jpg" width="200" height="200">
  </div>
  <div class="column">
    <h5 style="color: black; font-weight: bolder;font-size: 16px;">THE POLYTECHNIC,IBADAN</h5>
    <h6 style="color: white; background-color: black; border:2px solid black;text-align: center;">OLORI HALLS OF RESIDENCE</h6>
    <h6 style="text-align: center; color: orange;">ROOM  ALLOCATION FORM</h6> <br><br><br><br>
  </div>
  <div class="column">
    <div style="border: 1px solid black;  padding-bottom: 100px; margin-bottom: 50px;margin-top: 20px; margin-left: 40px;">
    <p style="padding-top: 30px; font-size: 20px;">Passport</p>
</div>

 <b><u>Form No :&nbsp;&nbsp;Hall/2019/&nbsp;&nbsp;</u></b><br><br>
</div>
  </div>
</div>
<div class="all">
    	 <form method="post">
        <div class="form-group">
        <label>Code</label>
        <input type="text" name="form_no" class="form-control" value="<?php echo "$form_no"?>" readonly>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success">submit</button>
        </div> 
       </form>
</div>
<p>The Warden reserves the right to allocate students to any available block or room</p>
</body>
</html>
