<?php
require_once "conn.php";
$rowCount = count($_POST["rooms"]);
for($i=0;$i<$rowCount;$i++) {
	$sql="UPDATE rooms SET status='reserve' WHERE id='".$_POST["rooms"][$i]."' ";
	$conn->query($sql);
  echo "<script>alert('Rooms successfull reserved');</script>";
  echo "<script>window.open('dashboard.php', '_SELF')</script>";
}
?>


