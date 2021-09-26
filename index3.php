<?php
require_once "conn.php";
$sql = "SELECT * FROM biodata where id ='3'";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
  $code = $row['form_no'];
  $id = $row['id'];
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
        max-width: 800px;
        border: none;
        border-radius: 20px;
        background-color: white;
        padding: 20px;

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
    <div class="all" style="padding-top: 100px;">
      <div class="row">
        <div class="column">
          <img src="polylogo.jpg" width="200" height="200">
        </div>
        <div class="column">
          <h5 style="color: black; font-weight: bolder;font-size: 16px;">THE POLYTECHNIC,IBADAN</h5>
          <h6 style="color: white; background-color: black; border:2px solid black;text-align: center;font-weight: bolder; line-height: 25.8px; font-family: algeria">OLORI HALL OF RESIDENCE</h6>
          <h6 style="text-align: center; color: orange;">ROOM ALLOCATION FORM</h6> <br><br><br><br>
        </div>
        <div class="column">
          <div style="padding-bottom: 50px; margin-left: 40px;">
            <p style="padding-top: 30px; font-size: 20px;"><img src="uploads/<?php echo $code ?>" width="100" alt=""></p>
          </div>

          <b><u>Form No :&nbsp;&nbsp;Hall/2020/21/<?php echo "$code" ?>&nbsp;&nbsp;</u></b><br><br>
        </div>
      </div>
    </div>

    <div class="all">
      <ol>
        <li><b>Name (SURNAME FIRST):</b> <?php echo $row['surname'] ?> <?php echo $row['othername'] ?></li><br>
        <li><b>Department:</b> <?php echo $row['department'] ?></li><br>
        <li><b>Level:</b> <?php echo $row['degree'] ?></li><br>
        <li><b>Religion:</b> <?php echo $row['religion'] ?></li><br>
        <li><b>Telephone:</b> <?php echo $row['phone'] ?></li><br>
        <li><b>Parent/Guardian/Telephone Number:</b> <?php echo $row['parent'] ?></li><br>
        <li><b>Any form of disability?</b> <?php echo $row['dissability'] ?></li><br>
        <li><b>If yes, State:</b> <?php echo $row['form'] ?></li><br>
      </ol>
      <p style="font-size: 16px; font-weight: bolder; padding-top: 10px;">The Warden reserves the right to allocate students to any available block or room.</p>
    </div>
  </body>

  </html>