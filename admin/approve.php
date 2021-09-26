<?php include "conn.php";
    $id = base64_decode($_GET["id"]);
    $update ="UPDATE biodata SET status='1' WHERE id ='$id'";
    $conn->query($update);
    echo "<script>alert(' Successfully approved');</script>";
    echo "<script>window.open('request.php', '_self');</script>";
