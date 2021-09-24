<?php

$conn= new mysqli("localhost", "royalcod_royaltech", "royaltech2011", "royalcod_royaltech");


if ($conn->connect_error) {
	# code...
	die("could not connect." .$conn->connect_error);
}



?>