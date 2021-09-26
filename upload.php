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

        </ul>
      </div>
    </div>
  </nav>

  <div style="margin-top:100px;">
    <form method="POST" enctype="multipart/form-data">
      <div class="row">

        <div class="col-md-4"></div>
        <div class="col-md-4">
          <span class="alert2"> Note: Only jpg is allowed and not more than 150kb in size</span><br><br><br>
          <div class="form-group text-center">
            <label>Upload your passport</label><br>
            <input type="file" name="file" accept=".jpg">
          </div>
          <div class="form-group">
            <button class="btn btn-info" type="submit" name="submit">submit</button>
          </div>
          </div>
          <div class="col-md-4"></div>
        </div>
    </form>
  </div>
  <?php
  $form = base64_decode($_GET["id"]);
  if (isset($_POST['submit'])) {
    if ($_FILES["file"]["size"] > 150000) {
      echo "<script>alert('File too large to upload, please reduce the size');</script>";
      echo "<script>window.open('upload.php?id=".$_GET["id"]."', '_self');</script>";
    }elseif(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) !='jpg'){
      echo "<script>alert('File type must be only jpg');</script>";
      echo "<script>window.open('upload.php?id=".$_GET["id"]."', '_self');</script>";

    } else {
      $temp = explode(".", $_FILES["file"]["name"]);
      $newfilename = $form . '.' . end($temp);
      move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename);
    }
    echo "<script>alert('Uploaded successfully');</script>";
    echo "<script>window.open('status.php?id=".$_GET["id"]."', '_self');</script>";
  }






  ?>
</body>