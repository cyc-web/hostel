<?php
    require_once"conn.php";
    $sql="SELECT * FROM biodata where room_category='BLOCK A' order by surname ";
    $result=$conn->query($sql);
    
?>
<!DOCTYPE html>
<html>
<head>
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
         .all{
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
  <div class="container">
  
  <div class="row">
    <div class="btn-group pull-right" style=" padding: 10px; text-align: right;">
      <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
     <span class="glyphicon glyphicon-th-list"></span> Download as
   
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                
                <li><a href="#" onclick="$('#employees').tableExport({type:'excel',escape:'false'});"> <img src="images/xls.png" width="24px"> XLS</a></li>
                <li><a href="#" onclick="$('#employees').tableExport({type:'doc',escape:'false'});"> <img src="images/word.png" width="24px"> Word</a></li>
                <!--li class="divider"></li>
                <li><a href="#" onclick="$('#employees').tableExport({type:'png',escape:'false'});"> <img src="images/png.png" width="24px"> PNG</a></li-->
                <li><a href="#" onclick="$('#employees').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="images/pdf.png" width="24px"> PDF</a></li>
                
  </ul>
</div>
    </div>
  </div>
</div>
</div>
  
        <div class="container">
          <div class="table-responsive">
            <div class="row" style="padding-left: 70px;">
        <table class="table table-bordered" style="color: ; font-size: 18px; width: 100%; margin: auto;" id="employees">
          <thead>
            <tr>
      <th>Number</th>
      <th>Form No.</th>
      <th>Surname</th>
      <th>Othernames</th>
      <th>Department</th>
      <th>Level</th>
      <th>phone</th>
      <th>Block</th>
      <th>Room No.</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = mysqli_fetch_array($result)) {
    $form_no=$row['form_no'];
    $id=$row['id'];
    $surname=$row['surname'];
    $othername=$row['othername'];
    $department=$row['department'];
    $degree=$row['degree'];
    $phone=$row['phone'];
    $room_category=$row['room_category'];
    $room=$row['room'];
    ?>
    <tr>
      <td><?php echo "$id"?></td>
      <td><?php echo "$form_no"?></td>
      <td><?php echo "$surname"?></td>
      <td><?php echo "$othername"?></td>
      <td><?php echo "$department"?></td>
      <td><?php echo "$degree"?></td>
      <td><?php echo "$phone"?></td>
      <td><?php echo "$room_category"?></td>
      <td><?php echo "$room"?></td>
    </tr>
  <?php }?>
  </tbody>
  </table>
  <script type="text/javascript">
//$('#employees').tableExport();
$(function(){
  $('#employees').DataTable();
      }); 
</script>
</body>
</html>