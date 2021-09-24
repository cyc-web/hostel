<?php
session_start();
include"conn.php";
//$ref=rand(100000, 999999);
if (isset($_POST['submit'])) {
  # code...
  $sql1="SELECT * FROM biodata WHERE phone='".$_POST['phone']."'";
  $result=$conn->query($sql1);
  $row=$result->fetch_array(MYSQLI_ASSOC);
  if ($row) {
    # code...
    echo "<script>alert('Records associated with this number already');</script>";
    exit();
  }else{
  $id= $_POST['id'];
  //$ref=$_POST['ref'];
  $surname= $_POST['surname'];
  $othername= $_POST['othername'];
  //$faculty= $_POST['faculty'];
  $department= $_POST['department'];
  $degree= $_POST['degree'];
  $dob= $_POST['dob'];
  $m_status= $_POST['m_status'];
  $religion= $_POST['religion'];
  $phone= $_POST['phone'];
  $email= $_POST['email'];
  $active_student= $_POST['active_student'];
  $parent= $_POST['parent'];
  $dissability= $_POST['dissability'];
  $form= $_POST['form'];
  $sql= "UPDATE biodata SET surname='$surname', othername='$othername', department='$department', degree='$degree', dob='$dob', m_status='$m_status', religion='$religion',  phone='$phone', email='$email', active_student='$active_student', parent='$parent', dissability='$dissability', form='$form', updated_time=now() WHERE id='$id'";
  $conn->query($sql);
  //$id=mysqli_insert_id($conn);
  //$_SESSION['id']=$id;
  echo "<script>alert('Records successfully submitted');</script>";
  echo "<script>window.open('student_biodata.php', '_self');</script>";
}
}
?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Student -Form</title>
    <style type="text/css">
        h2{
            color: darkgoldenrod;
            text-align: center;
        }
                h3{
            color: white; 
            font-family: algerian;
            text-align: center;
            background-color: black;
            max-width: 350px;
            margin: auto;
        }
        h4{
            font-family: ;
            color: red;
            text-align: center;
        }
          .body{
    font-family: cursive;
}
.navbar{
    background-color: darkgoldenrod;
}
    </style>
</head>
<body class="">
  <nav class="navbar navbar-inverse navbar-fixed-top navbar">
  <div class="container-fluids">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href=""><img src="polylogo.jpg" width="50" height="50"></a></li>
        <li><a href="" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">THE POLYTECHNIC, IBADAN</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li class=""><a href="receipt.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT RECEIPT</a></li>
        <li class=""><a href="print.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT FORM</a></li>
        <li><a href="track.php" class="" style="border-left: px solid white; margin-top: 15px; color: white">MAKE PAYMENT</a></li-->
      </ul>
    </div>
  </div>
</nav><br><br><br>
    <div class="container">
    <h2>THE POLYTECHNIC, IBADAN</h2>
    <h3>OLORI HALLS OF RESIDENCE</h3>
    <h4>ROOM ALLOCATION FORM</h4> 
     <hr>
         <form method="post">
          <div class="container">
            <div class="row">
                <div class="form-group col-md-6">
                  <label>Surname:</label>     
                  <input type="text" name="surname" class="well well-md" style="background-color: white;width:100%;">      
                </div>
                <div class="form-group col-md-6">
                  <label>Other Names:</label>
                  <input type="text" name="othername" class="well well-md" style="background-color: white;width:100%;">
                </div>
            </div>

            <div class=" row">
              <div class="form-group col-md-6">
                <label>Department:</label>
                  <select name="department" class="well well-md" style="background-color: white;width:100%;" required="">
			<option selected=""></option>
		<?php 
		include"conn.php";
		$sql= "SELECT * FROM department order by department";
		if ($result= $conn->query($sql)) {
			# code...
			while ($row= $result->fetch_array(MYSQLI_ASSOC)) { $c++; extract($row)
				# code...

		?>
			
			<option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>	
			<?php }}?>		
		</select>
              </div>
              <div class="form-group col-md-6">
                <label>Level:</label>
                  <select class="well well-md" name="degree" style="background-color: white;width:100%;" required="">
                    <option value=""></option>
                    <option value="ND 1">ND 1</option>
                    <option value="ND 2">ND 2</option>
                    <option value="HND 1">HND 1</option>
                    <option value="HND 2">HND 2</option>
                  </select>
              </div>
            </div>


            <div class="row">
              <div class="form-group col-md-6">
                <label>Date of Birth:</label>
                  <input type="date" name="dob" class="well well-md" style="background-color: white;width:100%;">
              </div>
              <div class="form-group col-md-6">
                <label>Marital Status:</label>
                  <select class="well well-md" name="m_status" style="background-color: white;width:100%;" required="">
                  <option value=""></option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Religion:</label>
                  <select name="religion" class="well well-md" style="background-color: white;width:100%;" required="">
                    <option value=""></option>
                    <option value="Christianity">Christianity</option>
                    <option value="Muslim">Muslim / Islam</option>
                    <option value="Traditional">Traditional</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label>Telephone:</label>
                  <input type="text" name="phone" class="well well-md" style="background-color: white;width:100%;">
              </div>

            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Have You Stayed in this Hostel Before</label>
                  <select name="active_student" class="well well-md" style="background-color: white;width:100%;" required="">
                    <option value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
              </div>

              <div class="form-group col-md-6">
                <label>Parent/Guardian Telephone Number:</label>
                  <input type="text" name="parent" class="well well-md" style="background-color: white;width:100%;" >
              </div>
              </div>
               <div class=" row">
              <div class="form-group col-md-6">
                <label>Serial Number:</label>
                  <input type="text" name="id" class="well well-md" style="background-color: white;width:100%;" >
              </div>
         
           
              <div class="form-group col-md-6">
                <label>Any Form of Disability?</label>
                  <select name="dissability" style="background-color: white;width:100%;" class="well well-md" required="">
                    <option value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Maybe">Maybe</option>
                  </select>
              </div>
                     
            
              <div class="form-group col-md-12">
                <label>If yes,State:</label>
                  <textarea class="form-control" name="form"></textarea> 
              </div>
                        
                          
                  <input type="submit" name="submit" class="btn btn-info btn-lg pull-right" style="">
            <div>
              
            </div>
          </div>
          <p style="text-align: ;"><b>Note :The Warden reserves the right to allocate students to any available block or room.</b></p>
        </div>
         </form>
     </div>
</div>
</body>
</html>