
<?php
session_start();
include"conn.php";


//$ref=rand(100000, 999999);
if (isset($_POST['submit'])) {
  # code...
  $sql1="SELECT * FROM biodata WHERE form_no='".$_POST["form_no"]."'";
  $result=$conn->query($sql1);
  $row=$result->fetch_array(MYSQLI_ASSOC);
  if ($row) {
    # code...
    echo "<script>alert('Record already exist.');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
  }else{
   //$matric= $_POST['matric'];
  $form_no=$_POST['form_no'];
  $surname= $_POST['surname'];
  $othername= $_POST['othername'];
  //$faculty= $_POST['faculty'];
  $department= $_POST['department'];
  $degree= $_POST['degree'];
  $phone = $_POST['phone'];
  
  $sql= "INSERT INTO biodata (form_no, surname, othername, department, degree, phone, date_apply) VALUES ('$form_no', '$surname', '$othername', '$department', '$degree', '$phone', now())";
  $conn->query($sql);
  
  echo "<script>alert('Records successfully submitted');</script>";
  echo "<script>window.open('index.php', '_self');</script>";

}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
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
      max-width: 800px;
      border: none;
      border-radius: 20px;
      background-color: ;
   
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

    hr.new1 {
  border-top: 5px solid black;
}

 .navbar{
  background-color: darkgoldenrod;
}

</style>
</head>
<body style="background-image: url(web/bg.png);">
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
        <li><a href=""><img src="polylogo.jpg" width="50" height="50"></a></li>
        <li><a href="../index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">THE POLYTECHNIC, IBADAN</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li class=""><a href="receipt.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT RECEIPT</a></li-->
       
        <!--li><a href="../index.php" class="" style="border-left: px solid white; margin-top: 15px; margin-right: 15px; color: white">Home</a></li-->
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary" style="border:1px solid darkgoldenrod">
                <div class="panel-heading" style="background-color: darkgoldenrod; border-bottom: 1px solid darkgoldenrod">Apply for a room</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Form No.</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="form_no" value="" autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="surname" value="" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Othernames</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="othername" value="" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <select name="department" class=" form-control" required="">
                                  <option selected=""></option>
                                  <?php 
                                    include"conn.php";
                                  $sql= "SELECT * FROM department order by department";
                                  if ($result= $conn->query($sql)) {
     
                                    while ($row= $result->fetch_array(MYSQLI_ASSOC)) { $c++; extract($row)
       
                                  ?>
                                    <option value="<?php echo "$department" ?>"><?php echo $row['department'] ?></option>  
                                  <?php }}?>    
                                 </select>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                                <select name="degree" class="form-control" required="">
                                  <option></option>
                                  <option value="ND 1">ND 1</option>
                                  <option value="ND 2">ND 2</option>
                                  <option value="HND 1">HND 1</option>
                                  <option value="HND 2">HND 2</option>
                                  
                                </select>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Telephone</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="phone" value=""  required autofocus>

                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="panel-footer" style="background-color: darkgoldenrod; width:100%; clear: both;"><p style="font-size: 16px; font-weight: bolder; color: white">Warden reserves the right to allocate students to any available block or room. </p></div>
            </div>
        </div>
      </div>
    </div>
</div>


</body>
</html>