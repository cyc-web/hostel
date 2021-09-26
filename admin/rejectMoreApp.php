<?php
error_reporting(0);
require_once "conn.php";
$rowCount = count($_POST["id"]);
if ($rowCount < 1) {
    echo "<script>alert('Please check at least one student');</script>";
    echo "<script>window.open('allocated.php', '_SELF')</script>";
}
for ($i = 0; $i < $rowCount; $i++) {

    $update = "UPDATE biodata SET status='2' WHERE id ='" . $_POST["id"][$i] . "'";
    $update2 = "UPDATE room SET status='0' WHERE id ='" . $_POST["room"][$i] . "'";
    $conn->query($update);
    $conn->query($update2);

    echo "<script>alert('Requests successfully approved');</script>";
    echo "<script>window.open('allocated.php', '_SELF')</script>";
}
