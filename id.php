
<?php
    require_once"conn.php";
    $sql="SELECT biodata.id,biodata.room,biodata.room_category,biodata.surname,biodata.othername,biodata.department,biodata.degree, biodata.img,biodata.phone, rooms.id, rooms.room FROM biodata inner join rooms on biodata.room=rooms.id where biodata.id ='917' order by rooms.room";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_array($result)) {
    $room=$row['room'];
    $surname=$row['surname'];
    $othername=$row['othername'];
    $department=$row['department'];
    $degree=$row['degree'];
    $img=$row['img'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Id card </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  	
  </style>
  </head>
  <body>
  <div style="max-width: 450px;margin: auto; background-color: ">
  	<div style="border-bottom: 25px solid darkgoldenrod;">
	<div style="background-color: darkgoldenrod; color: white; border: 1px solid black; border-bottom:">
	<p style=""><img src="polylogo.jpg" width="50" height="50" style="float: left;margin-right: 15px;padding-left: 5px;">
		<h3 style="font-family: ; font-weight: bolder; margin-top: px; margin-left: px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE POLYTECHNIC IBADAN</h3>
		<h4 style="margin-left: px;font-family: ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OLORI HALL OF RESIDENCE</h4>
	</p>
	<p style="text-align: right;">Room No: <?php echo "$room"?>&nbsp;</p>
	
</div>
<p style=""><img src="uploads/<?php echo "$img"?>" width="120" height="120" style="float: left;margin-right: 25px;">
		<p style="font-family: ; font-weight: bolder; margin-top: 50px; margin-left: px; color:"><span style="text-transform: uppercase;"> <?php echo "$surname";?></span> <?php echo "$othername";?></p>
		
	</p>
	<p style="color: ; font-weight: bolder;"><?php echo "$department"?></p>
	<p style="margin-left: 125px; font-weight: bolder;"><?php echo "$degree"?></p>
</div><br>
	<!--div style="background-color: darkgoldenrod; color: white; border: 15px solid darkgoldenrod">
	
</div>
<!--p style=" padding-left: 5px; margin-top: 50px">This is to certify that the bearer whose name and passport appear on this card is an occupant of  </p>
	<h3 style="font-family: algerian; font-weight: bolder; margin-top: px; margin-left: px; text-align: center;">OLORI HALL OF RESIDENCE</h3><hr>

	<p style="padding-left: 5px; margin-bottom: 50px">If found, kindly return to<span style="font-family: algerian"> OLORI HALL OF RESIDENCE</span></p>
	<footer style="border: 1px solid darkgoldenrod; background-color: darkgoldenrod; color: white; text-align: center;">
		<p>Hall/2019/2020/0001</p>
	</footer>
	
</div-->
<?php }?>
</body>
</html>