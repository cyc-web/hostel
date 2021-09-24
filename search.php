
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
  <input type="text" name="room" class="size" required="" placeholder="Enter the room number">
</div><br>
  <button type="submit" name="submit" class="btn btn-info">SEARCH</button>
</form><br>
 <table style="margin-top: 50px;">
<tr>
<!--a href="update.php" class="btn btn-success">Proceed</a-->

   
<th>Room No</th>
<th>Block</th>
<th>Status</th>

</tr>


    <?php
//mysqli_select_db($con,"ajax_demo");
    include"conn.php";
if (isset($_POST['submit'])) {
    # code...
    $room=$_POST['room'];
    $sql="SELECT * from rooms WHERE room = '$room'";
if($result=$conn->query($sql)){
    while ($row=$result->fetch_array(MYSQLI_ASSOC)) {extract($row);

     //$id=$row['id'];    
    //$department= $row['department'];
    $room=$row['room'];
    $block=$row['room_category'];
    $status=$row['status'];
    //$surname=$row['surname'];
    //$level=$row['degree'];
    //$phone=$row['phone'];
     if($status=='0'){
         $s=Available;
     }elseif($status=='1'){
         $s=Occupied;
     }elseif($status == 'reserve'){
         $s=Reserved;
     }else{
         $s="Faulty";
     }


?>
<tr>

    <td><?php echo"$room";?></td>
    <td><?php echo"$block";?></td>
    <td><?php echo"$s";?></td>
</tr>
<?php }?>
<?php }}?>
      </table>


</div>

</body>
</html>
