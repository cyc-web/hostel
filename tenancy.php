<!--?php
    require_once"conn.php";
    $sql="SELECT * FROM biodata where id >='934'";
    $result=$conn->query($sql);
    while($row = mysqli_fetch_array($result)) {
    $code=$row['form_no'];
    $id=$row['id'];
?-->
<!DOCTYPE html>
<html>
<head>
     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title></title>
    <style type="text/css">
         .all{
        max-width: 700px;
        margin: auto;
        text-align: left;
          }
          .all1{
        max-width: 700px;
        margin: auto;
          } 
          p{
            text-align: center;
          }  
          h4{
            color: tan;
          }
        * {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
  
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>
<div class="all1">
<div class="row">
  <div class="column">
    <img src="polylogo.jpg" width="150" height="150">
  </div>
  <div class="column" style="margin-top: 20px;">
    <h5 style="color: black; font-weight: bolder;font-size: 16px;">THE POLYTECHNIC,IBADAN</h5>
    <h6 style="color: black; background-color:; border:;text-align: center;font-weight: bolder; line-height: 25.8px; font-family:; font-size: 16px;">OLORI HALL OF RESIDENCE</h6>
    <h6 style="text-align: center; color: black; font-size: 20px; font-weight: bold;">TENANCY AGREEMENT</h6>
    <p>SESSION : 2019/2020</p> <br><br><br><br>
  </div>
  <div class="column">
    <div style="border: 1px solid black;  padding-bottom: 100px; margin-bottom: 50px;margin-top: 20px; margin-left: 40px;">
    <p style="padding-top: 30px; font-size: 20px;">Passport</p>
</div>

</div>
  </div>
</div>
<!--div class="column side2">
    <img src="" height="200" width="200" align="right" style="margin-right: 10px">
</div>

<div>
    <form>
<p style="text-align: right;margin-right: 57px;font-family: arial;">Form no:<input type="value" name="form no"><br><br></p>
    </form>
</div-->
<div class="all">
         <ol>
              <li>
                <p>I,..................................of the Faculty .......................... Department/Level .......................................Room No...........................</p>
              </li>
              <ol type="a">
                <li>
                  <p>Parent/Guadian Name and Address.............................................................................................................................................</p>
                </li>
                <ol type="i">
                  <li>
                    <p>Permanent home address:...................................................................................................................................................</p>
                  </li>
                  <li>
                    <p>Email address........................................................................................................................................................................</p>
                  </li>
                  <li>
                    <p>Telephone Number(s)................................................................................................................................................................</p>
                  </li>
                </ol>
              </ol>
        </ol>
        <!--p style="font-size: 16px; font-weight: bolder; padding-top: 20px;">The Warden reserves the right to allocate students to any available block or room.</p>
        <p style="text-align: center; margin-top: 20px;"><?php echo "$id";?></p-->
</div>
</body>
</html>
