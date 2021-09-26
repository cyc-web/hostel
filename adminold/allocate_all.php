<?php
require_once "conn.php";
$rowCount = count($_POST["rooms"]);
for($i=0;$i<$rowCount;$i++) {
	$sql="UPDATE biodata SET status='1', room='$room', room_category='$room_category' WHERE id='".$_POST["rooms"][$i]."' ";
	$conn->query($sql);
  echo "<script>alert('Rooms successfull allocate');</script>";
  echo "<script>window.open('dashboard.php', '_SELF')</script>";
}
?>


