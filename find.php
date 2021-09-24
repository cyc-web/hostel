
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
.size{
    width: 200px;
    border-radius: 5px;
    height: 35px;
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="container">
    <form method="POST">
        <div class="size">
  <input type="text" name="surname" class="size" required="" placeholder="Enter surname">
</div><br>
  <button type="submit" name="submit" class="btn btn-info">SEARCH</button>
</form><br>
 <table style="margin-top: 50px;">
<tr>
<!--a href="update.php" class="btn btn-success">Proceed</a-->

    <th>Id</th>
<th>Surname</th>
<th>Othername</th>
<th>Level</th>
<th>Department</th>
<th>Phone No</th>
<th>Room No</th>
<th>Block</th>

</tr>


    <?php
//mysqli_select_db($con,"ajax_demo");
    include"conn.php";
if (isset($_POST['submit'])) {
    # code...
    $surname=$_POST['surname'];
    $sql="SELECT biodata.id, biodata.surname, biodata.othername, biodata.degree, biodata.department, biodata.phone,biodata.room_category, rooms.room FROM biodata inner join rooms on biodata.room=rooms.id WHERE biodata.surname = '$surname'";
if($result=$conn->query($sql)){
        while($row=$result->fetch_array(MYSQLI_ASSOC)){

     $id=$row['id'];    
    $department= $row['department'];
    $room=$row['room'];
    $block=$row['room_category'];
    $othername=$row['othername'];
    $surname=$row['surname'];
    $level=$row['degree'];
    $phone=$row['phone'];
     


?>
<tr>
        <td><?php echo"$id";?></td>

    <td><?php echo"$surname";?></td>
    
    <td><?php echo"$othername";?></td>
    <td><?php echo"$level";?></td>
    <td><?php echo"$department";?></td>
    <td><?php echo"$phone";?></td>
    <td><?php echo"$room";?></td>
    <td><?php echo"$block";?></td>
</tr>
<?php }}?>
<?php }?>
      </table>


</div>

</body>
</html>
