<?php
include "conn.php";
	$sql="SELECT * FROM biodata where room_category !=''";
	$result=$conn->query($sql);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	if ($row) {
		# code...
		$sql1="UPDATE biodata SET status='1' where room_category !=''";
		$conn->query($sql1);
		echo "Updated";
	}
?>