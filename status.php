<?php
error_reporting(0);
$id = base64_decode($_GET["id"]);
function getRoom($id)
{
  include "conn.php";
  $sql = "SELECT * FROM room WHERE id ='$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  return $row['room'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Room Status</title>
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

    hr.new1 {
      border-top: 5px solid black;
    }

    .navbar {
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
          <li><a href="index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">THE POLYTECHNIC, IBADAN</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="" style="padding-right: 20px;"><a href="index.php" style="border-right: px solid white; margin-top: 15px; color: white;">Home</a></li>

          <!--li><a href="../index.php" class="" style="border-left: px solid white; margin-top: 15px; margin-right: 15px; color: white">Home</a></li-->
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-top: 100px;">
    <?php if ($id) {
      include 'conn.php';
      $sql1 = "SELECT * FROM biodata WHERE form_no='$id'";
      $result = $conn->query($sql1);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $form_no = $row['form_no'];
      $surname = $row['surname'];
      $othername = $row['othername'];
      $department = $row['department'];
      $degree = $row['degree'];
      $phone = $row['phone'];
      $parent = $row['parent'];
      $dissability = $row['dissability'];
      $room = $row['room'];
      $religion = $row['religion'];
      $room_category = $row['room_category'];
      $form = $row['form'];
      $status = $row['status'];
    ?>
      <div class="all">
        <div class="row">
          <div class="col-md-4">
            <p><img src="uploads/<?php echo $row['form_no'] ?>" width="100" alt="" class="img-rounded"></p>
          </div>
          <div class="col-md-8 text-right">
            <b><u>Form No :&nbsp;&nbsp;Hall/2020/21/<?php echo $row['form_no'] ?>&nbsp;&nbsp;</u></b><br><br>
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
          <li><b>Room Status:</b> <?php echo $row['status'] == 1 ?  getRoom($row['room']) : '<p style="background-color:green; display:inline; color:white;padding:2px">Pending! this is subject to warden approval. always check room status</p>' ?></li><br>
        </ol>
        <p style="font-size: 16px; font-weight: bolder; padding-top: 10px;">The Warden reserves the right to allocate students to any available block or room.</p>
      </div>
    <?php } else { ?>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <?php
          include "conn.php";
          if (isset($_POST['submit'])) {
            # code...
            $sql1 = "SELECT * FROM biodata WHERE form_no='" . $_POST["form_no"] . "'";
            $result = $conn->query($sql1);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row) {
              $form_no = $row['form_no'];
              $surname = $row['surname'];
              $othername = $row['othername'];
              $department = $row['department'];
              $degree = $row['degree'];
              $phone = $row['phone'];
              $parent = $row['parent'];
              $dissability = $row['dissability'];
              $room = $row['room'];
              $religion = $row['religion'];
              $room_category = $row['room_category'];
              $form = $row['form'];
              $status = $row['status'];
            } else {

              echo "<script>alert('No record found! contact hall warden');</script>";
              echo "<script>window.open('status.php', '_self');</script>";
            }
          ?>
            <div class="all">
              <div class="row">
                <div class="col-md-4">
                  <p><img src="uploads/<?php echo $row['form_no'] ?>" width="100" alt="" class="img-rounded"></p>
                </div>
                <div class="col-md-8 text-right">
                  <b><u>Form No :&nbsp;&nbsp;Hall/2020/21/<?php echo $row['form_no'] ?>&nbsp;&nbsp;</u></b><br><br>
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
                <li><b>Room Status:</b> <?php echo $row['status'] == 1 ?  getRoom($row['room']) : '<p style="background-color:green; display:inline; color:white;padding:2px">Pending! this is subject to warden approval. always check room status</p>' ?></li><br>
              </ol>
              <p style="font-size: 16px; font-weight: bolder; padding-top: 10px;">The Warden reserves the right to allocate students to any available block or room.</p>
            </div>
          <?php } else { ?>
            <div class="panel panel-primary" style="border:1px solid darkgoldenrod">
              <div class="panel-heading" style="background-color: darkgoldenrod; border-bottom: 1px solid darkgoldenrod">Check room status</div>

              <div class="panel-body">
                <form class="form-horizontal" method="POST" action="">

                  <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Form No.</label>

                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control" name="form_no" value="" autofocus>

                    </div>
                  </div>



                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary" name="submit">
                        Check Status
                      </button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
        </div>
      <?php } ?>
      </div>
  </div>
<?php } ?>
</div>
</body>

</html>