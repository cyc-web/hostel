
<!--?php
    require_once"conn.php";
    $sql="SELECT * FROM biodata where id='121'";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_array($result)) {
    //$code=$row['form_no'];
    //$id=$row['id'];
?-->

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
  	<div style="border-bottom: 1px solid darkgoldenrod;">
	
	<div style="background-color: darkgoldenrod; color: white; border: 15px solid darkgoldenrod">
	
</div>
<p style=" padding-left: 5px; margin-top: 35px">This is to certify that the bearer whose name and passport appear on this card is an occupant of  </p>
	<h3 style="font-family: algerian; font-weight: bolder; margin-top: px; margin-left: px; text-align: center;">OLORI HALL OF RESIDENCE</h3><hr>

	<p style="padding-left: 5px; margin-bottom: 45px">If found, kindly return to<span style="font-family: algerian"> OLORI HALL OF RESIDENCE</span></p>
	<footer style="border: 1px solid darkgoldenrod; background-color: darkgoldenrod; color: white; text-align: center;">
		<p>Validity : 2019/2020 Session Only.</p>
	</footer>
	
</div>
</div>
</body>
</html>
