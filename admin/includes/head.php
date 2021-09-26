<?php
session_start();
require_once "functions.php";
require_once "conn.php";
if (!isset($_SESSION["admin"])) {
  session_unset();
  session_destroy();
  header("location:index.php");
}

if (isset($_SESSION["admin"])) {
  $sql = "SELECT  * FROM admin  WHERE  email='" . $_SESSION["admin"] . "' ;";
  //  $row = mysql_fetch_array(mysql_query($sql));
  $result = $conn->query($sql);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $name = $row['name'];
  $officer = $row['name'] . ' ' . $row['othername'];
  $user_id = $row['id'];
  $tasks = $row['role_id'];
  $user = explode(",", $tasks);
  $current_password = $row['password'];
}
$sql = mysqli_query($conn, "SELECT * FROM admin") or die(mysqli_error($conn));
$total_user = mysqli_num_rows($sql);
$sql2 = mysqli_query($conn, "SELECT * FROM admin WHERE id !='$user_id'") or die(mysqli_error($conn));
$total_user2 = mysqli_num_rows($sql2);

$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK A'") or die(mysqli_error($conn));
$a = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK B'") or die(mysqli_error($conn));
$b = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK C'") or die(mysqli_error($conn));
$c = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK D'") or die(mysqli_error($conn));
$d = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK E'") or die(mysqli_error($conn));
$e = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK F'") or die(mysqli_error($conn));
$f = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE room_category = 'BLOCK G'") or die(mysqli_error($conn));
$g = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT room, room_category FROM biodata WHERE dissability = 'Yes'") or die(mysqli_error($conn));
$disable = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT id FROM biodata WHERE status = '0'") or die(mysqli_error($conn));
$request = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT id FROM biodata WHERE status = '1'") or die(mysqli_error($conn));
$approve = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT id FROM biodata WHERE status = '2'") or die(mysqli_error($conn));
$reject = mysqli_num_rows($sql);
$sql = mysqli_query($conn, "SELECT id FROM room WHERE status = '0'") or die(mysqli_error($conn));
$room = mysqli_num_rows($sql);
?>
<?php
$h = $a + $b + $c + $d + $e + $f + $g;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#select_all').click(function() {
        $('input[type="checkbox"]').prop('checked', this.checked);
      });
    });
  </script>
  <style>
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

    .record {
      border: 1px solid black;
      padding: 5px;
      text-align: left;
    }

    .div {
      margin-bottom: 20px;
      width: 600px;
    }
  </style>
</head>