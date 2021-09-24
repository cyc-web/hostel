<?php error_reporting(0);?>
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
$id = $_SESSION['id'];
?>
<?php include"conn.php";

if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM oye_hall  WHERE  phone='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $phone=$row['phone'];
    //$name=$row['name'];

    $phone = $row['phone'];
    $email = $row['email'];
    $surname = $row['surname'];
    $othername = $row['othername'];
  
$sql1 = mysqli_query($conn, "SELECT * FROM payment WHERE phone='$phone' AND status='unpaid'") or die(mysqli_error($conn));
      $row1=mysqli_fetch_array($sql1);
        $amount_charge=$row1['amount_charge'] + 200;
        $ref_no = $row1['ref_no'];
        $purpose=$row1['purpose'];

    

?>
	
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   

  <style type="text/css">

input[type=text], input[type=date], input[type=email]{
      width: 100%;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 5px solid black;
      outline: none;
      font-size: 16px;
      margin-bottom: 10px;
    }
    select{
      width: 100%;
      height: 50px;
      border-left: none;
      border-top: none;
      border-right: none;
      border-bottom: 2px solid black;
      outline: none;
    
      font-size: 16px;
      margin-bottom: 10px;
    }
    hr.new1 {
  border-top: 5px solid black;
}
.navbar{
  background-color: green;
}


  </style>
</head>
<body>

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
        <li><a href=""><img src="img/fuoye.jpg" width="50" height="50"></a></li>
        <li><a href="../index.php" style="border-right: px solid white; color: white; margin-top: 15px; font-size: 20px;">FEDERAL UNIVERSITY, OYE-EKITI</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--li class=""><a href="receipt.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT RECEIPT</a></li>
        <li class=""><a href="print.php" style="border-right: px solid white; margin-top: 15px; color: white;">PRINT FORM</a></li>
        <li><a href="track.php" class="" style="border-left: px solid white; margin-top: 15px; color: white">MAKE PAYMENT</a></li-->
      </ul>
    </div>
  </div>
</nav><br><br><br><br>


<div style="max-width: 500px;margin: auto;background-color: #fff;padding-bottom: 30px;">
  <p style="text-align: center; font-size: 22px; font-weight: bolder; color: red;">PLEASE COPY THE REFERENCE NUMBER BEFORE CLICKING PAY NOW &nbsp;&nbsp;</p>
  <hr class="new1"><br>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
      <label> REFERENCE NO.</label>
      <input type="text" class="" value="<?php echo "$ref_no"; ?>" name="ref_no" readonly="">
    <div class="form-group">
      <label> FULL NAME:</label>
      <input type="text" value="<?php echo $row['surname'];?> <?php echo $row['othername'];?>" class="" name="name" readonly="">
    </div>
    <div class="form-group">
      <label> PHONE NO.</label>
      <input type="text" class="" value="<?php echo "$phone"; ?>" name="phone" readonly="">
      <div class="form-group">
      <label> Email.</label>
      <input type="text" class="" value="<?php echo "$email"; ?>" name="email" readonly="">
    </div>
    <div class="form-group">
      <label> AMOUNT TO BE PAID</label>
      <input type="text" class="" value="<?php echo "$amount_charge";?>" name="amount_charge" readonly="">
    </div>
    <div class="form-group">
      <label> PAYMENT PURPOSE</label>
      <input type="text" class="" name="purpose" value="<?php echo "$purpose";?>" readonly >
    </div>
   <button class="btn btn-success btn-block" onclick="payWithPaystack()" type="button">Pay Now!</button>
   <!--a href="https://paystack.com/pay/k81p4-uzym">Pay</a-->
  </form>
     <script src="https://js.paystack.co/v1/inline.js"></script>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_fe48ac7ae1c4b707a8cb35c74150034f095f955f',
      email: '<?php echo $email;?>',
      amount: <?php echo $amount_charge;?>00,
      subaccount : ACCT_1z2f1akvijornsm,
      transaction_charge: 10000,
      ref: '<?php echo $ref_no;?>', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "<?php echo $surname;?> <?php echo $othername;?>",
                variable_name: "mobile_number",
                value: "<?php echo $phone;?>"
            }
         ]
      },
      callback: function(response){
           window.location.replace("pverify.php?ref="+response.reference);
      },
      onClose: function(){
          alert('Payment Cancelled');
      }
    });
    handler.openIframe();
  }
</script>

   
 
</div>
</body>