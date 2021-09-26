<?php
error_reporting(0);
require_once "conn.php";
$rowCount = count($_POST["id"]);
if ($rowCount < 1) {
  echo "<script>alert('Please check at least one student');</script>";
  echo "<script>window.open('request.php', '_SELF')</script>";
}
for($i=0;$i<$rowCount;$i++) {
    $update = "UPDATE biodata SET status='1' WHERE id ='" . $_POST["id"][$i] . "'";
    $conn->query($update);
    
  echo "<script>alert('Requests successfully approved');</script>";
  echo "<script>window.open('request.php', '_SELF')</script>";
}
