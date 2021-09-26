<?php
    $fileName = $_FILES["file1"]["name"];
    $fileTemp = $_FILES["file1"]["tmp_name"];
    $fileType = $_FILES["file1"]["type"];
    $fileSize = $_FILES["file1"]["size"];
    $fileError = $_FILES["file1"]["error"];
    $path ="uploads/";
    if (!$fileTemp) {
       echo "Select a file";
       exit();
    }
    if (move_uploaded_file($fileTemp, $path.$fileName)) {
        echo "File uploaded";
    }else{
        echo "Upload failed";
    }
?>