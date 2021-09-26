<?php
include "conn.php";

$message = '';
$surname = '';
$form_no = '';
$othername = '';
$department = '';
$degree = '';
$phone = '';
$parent = '';
$religion = '';
$dissability = '';
$form = '';

if (isset($_POST['submit'])) {
  $form_no = $_POST['form_no'];
  $surname = $_POST['surname'];
  $othername = $_POST['othername'];
  //$faculty= $_POST['faculty'];
  $department = $_POST['department'];
  $degree = $_POST['degree'];
  $phone = $_POST['phone'];
  $parent = $_POST['parent'];
  $religion = $_POST['religion'];
  $dissability = $_POST['dissability'];
  $form = $_POST['form'];
  if ($_FILES["file"]["size"] > 150000) {
    $message = '<div class="alert2"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>File too large to upload, please reduce the size</div>';
  } elseif (pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != 'jpg') {
    $message = '<div class="alert2"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>File type must be only jpg</div>';

  } else {
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = $form_no . '.' . end($temp);
    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
    $sql1 = "SELECT * FROM biodata WHERE form_no='" . $_POST["form_no"] . "' AND date_apply IS NULL";
    $result = $conn->query($sql1);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row) {
      $newForm = base64_encode($form_no);
      $sql = "UPDATE biodata SET surname = '$surname', othername ='$othername', department ='$department', degree ='$degree', phone ='$phone', parent='$parent', religion = '$religion', dissability ='$dissability', form ='$form', date_apply=now() WHERE form_no ='$form_no'";
      $conn->query($sql);
      echo "<script>alert('Submit Successful');</script>";
      echo "<script>window.open('status.php?id=" . $newForm . "', '_self');</script>";
    } else {
      
      $message = '<div class="alert2"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>Unable to bid for a room! contact hall warden</div>';
    }
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
    .all {
      margin: auto;
      padding: 20px 20px;
      max-width: 800px;
      border: none;
      border-radius: 20px;

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

    .navbar {
      background-color: darkgoldenrod;
    }

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

    .alert3 {
      padding: 10px;
      background-color: yellow;
      color: red;
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
          <li><a href="index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">THE POLYTECHNIC, IBADAN</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="" style="padding-right: 20px;"><a href="status.php" style="border-right: px solid white; margin-top: 15px; color: white;">Check room status</a></li>

          <!--li><a href="../index.php" class="" style="border-left: px solid white; margin-top: 15px; margin-right: 15px; color: white">Home</a></li-->
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-top: 80px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h3 class="text-center text-uppercase">olori hall of residence</h3>
        <div class="panel panel-primary" style="border:1px solid darkgoldenrod">
          <?php echo $message ?>
          <div class="panel-heading" style="background-color: darkgoldenrod; border-bottom: 1px solid darkgoldenrod">Apply for a room</div>

          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Form No.</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="form_no" value="<?php echo $form_no ?>" autofocus>

                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Surname</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="surname" value="<?php echo $surname ?>" required autofocus>

                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Othernames</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="othername" value="<?php echo $othername ?>" required autofocus>
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Religion</label>

                <div class="col-md-6">
                  <input type="radio" name="religion" id="" <?php echo $religion == 'Christian' ? 'checked' : '' ?> value="Christian"> Christian &nbsp;
                  <input type="radio" name="religion" id="" <?php echo $religion == 'Muslim' ? 'checked' : '' ?> value="Muslim"> Muslim &nbsp;
                  <input type="radio" name="religion" id="" <?php echo $religion == 'Other' ? 'checked' : '' ?> value="Other"> Other
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Department</label>

                <div class="col-md-6">
                  <select name="department" class=" form-control" required="">
                    <option value="<?php echo $department ? $department : '' ?>"><?php echo $department ? $department : '' ?></option>
                    <?php
                    include "conn.php";
                    $sql = "SELECT * FROM department order by department";
                    if ($result = $conn->query($sql)) {

                      while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $c++;
                        extract($row)

                    ?>
                        <option value="<?php echo "$department" ?>"><?php echo $row['department'] ?></option>
                    <?php }
                    } ?>
                  </select>

                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Level</label>

                <div class="col-md-6">
                  <select name="degree" class="form-control" required="">
                    <option value="<?php echo $degree ? $degree : '' ?>"><?php echo $degree ? $degree : '' ?></option>
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
                  <input id="name" type="text" class="form-control" name="phone" value="<?php echo $phone ?>" required autofocus>

                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Parent Telephone</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="parent" value="<?php echo $parent ?>" required autofocus>

                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Any for of disability?</label>

                <div class="col-md-6">
                  <select name="dissability" class="form-control" required="">
                    <option value="<?php echo $dissability ? $dissability : '' ?>"><?php echo $dissability ? $dissability : '' ?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">If yes state:</label>

                <div class="col-md-6">
                  <textarea name="form" class="form-control" id="" cols="" rows=""><?php echo $form ? $form : '' ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Passport:</label>

                <div class="col-md-6">
                  <span class="alert2">Only jpg is allowed and not more than 150kb in size</span><br><br><br>
                  <div class="form-group text-center">
                    <input type="file" name="file" accept=".jpg">
                  </div>
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
          <div class="panel-footer" style="background-color: darkgoldenrod; width:100%; clear: both;">
            <p style="font-size: 16px; font-weight: bolder; color: white">Warden reserves the right to allocate students to any available block or room. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


</body>

</html>