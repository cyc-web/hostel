
<?php
require_once('conn.php');
  ini_set('max_execution_time', '6000');


    if (isset($_POST['upload'])){
    //$numeration=$_POST['numeration'];
    //$password=$_POST['password'];
    //$Surname=$_POST['Surname'];
    //$Other_names=$_POST['Other_names'];
    $file = $_FILES['file']['tmp_name'];
$handle = fopen($file,"r");
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
    
        $sql1="INSERT INTO rooms (room,room_category)VALUES('$data[0]', '$data[1]') ";
    $conn->query($sql1);
    echo "<script>alert('records successfully uploaded');</script>";
    //echo "<script>window.open('room_upload.php', '_self');</script>";


    
    

?>
<?php }}?>
<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body><br><br>
    <div style="" class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
            <input type="file" name="file" required="" accept=".csv">
        </div>
        <div class="form-group">
            <button type="submit" name="upload" class="btn btn-info ">UPLOAD</button>
        </div>
</form>
</div><br><br>
<div class="container">
    <p>The excel file should be prepared in this format and save as csv(comma delimited)</p>

 <table>
<tr>
    
    <th>ROOM NO.</th>
    <th>ROOM BLOCK</th>
    
</tr>
</table>
</div>
</body>
</html>
