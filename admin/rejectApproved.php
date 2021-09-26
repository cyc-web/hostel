<?php include "conn.php";
    $id = base64_decode($_GET["id"]);
    $room = base64_decode($_GET["r"]);
    $update ="UPDATE biodata SET status='2' WHERE id ='$id'";
    $update2 ="UPDATE room SET status='0' WHERE id ='$room'";
    $conn->query($update);
    $conn->query($update2);
    echo "<script>alert(' Successfully rejected');</script>";
    echo "<script>window.open('allocated.php', '_self');</script>";
