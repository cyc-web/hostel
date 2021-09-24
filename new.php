
<?php
session_start();
require_once('conn.php');

    if (isset($_POST['upload'])){
    //$numeration=$_POST['numeration'];
    //$password=$_POST['password'];
    //$Surname=$_POST['Surname'];
    //$Other_names=$_POST['Other_names'];
    $file = $_FILES['file']['tmp_name'];
$handle = fopen($file,"r");
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
    $sql="SELECT * FROM biodata WHERE form_no='$data[0]'";
$result=$conn->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);
if ($row) {
    # code...
 

    $sql="UPDATE biodata SET surname='$data[1]', othername='$data[2]',department='$data[3]', degree='$data[4]',m_status='$data[5]', phone='$data[6]', religion='$data[7]', parent='$data[8]', active_student='$data[9]', dissability='$data[10]', form='$data[11]', dob='$data[12]', updated_time=now() WHERE form_no='$data[0]' ";
    
    
    $conn->query($sql);
    

    echo "<script>alert('records successfully updated');</script>";
        echo "<script>window.open('new.php', '_self');</script>";


}
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
<body style="background-color: "><br><br>

    <div class="container">
        <hr>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
            <input type="file" name="file" required="" accept=".csv">
        </div>
        <div class="form-group">
            <button type="submit" name="upload" class="btn btn-info ">UPLOAD</button>
        </div>
</form><br><br>
<div class=>
    <p>The excel file should be prepared in this format without heading and save as csv(comma delimited)</p>

 <table>
<tr>
    <th>Form No.</th>
    <th>surname</th>
    <th>othername</th>
    <th>Department</th>
    <th>Level</th>
    <th>Marital status</th>
    <th>Phone</th>
    <th>Religion</th>
    <th>Parent phone</th>
    <th>Ever stayed?</th>
    <th>Dissability</th>
    <th>Form of dissability</th>
    <th>Date of birth</th>
    <th>Room No.</th>
    <th>Room category</th>
</tr>
</table>
</div>
</body>
</html>
