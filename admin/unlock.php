<?php
require_once "conn.php";
$rowCount = count($_POST["rooms"]);
for($i=0;$i<$rowCount;$i++) {
	$sql="UPDATE room SET status='0' WHERE id='".$_POST["rooms"][$i]."' ";
	$conn->query($sql);
  echo "<script>alert('Rooms successfully unlocked');</script>";
  echo "<script>window.open('dashboard.php', '_SELF')</script>";
}
?>


