
<?php 
require_once"conn.php"; 
$email ='';
$message ='';
if (isset($_POST['login'])) {
  $email = $_POST['email'];    
  $password = md5($_POST['password']);
  
  
  $sql="SELECT * FROM admin WHERE email='$email' AND password='$password'";
  $result=$conn->query($sql);
  $row=$result->fetch_array(MYSQLI_ASSOC);
  $status = $row['deleted_at'];
    if ($row && empty($status)) 
    {
      session_start();
      $_SESSION['admin'] = $_POST['email'];

      header("location: dashboard.php");
     }elseif($row && !empty($status)){
      $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                You are dissabled, contact admin.
            </div>";
    }else{
       $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                 We do not have your record.
             </div>";

     }
    
    
    
   } 

  ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

         
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">         
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<style>
.alert {
  padding: 10px;
  background-color: green;
  color: white;
  width: 50%;
}
.alert2 {
  padding: 10px;
  background-color: red;
  color: white;
  width: 100%;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: red;
}
</style>
</head>

<body style="background-color: whitesmoke;">
  <div class="center">
    <img src="../polylogo.jpg" alt="logo" width="80" />
    <div class="center">             
      <a>OLORI HALL OF RESIDENCE TPI :: HOSTEL MANAGEMENT SYSTEM</a><hr style="border-bottom:1px solid blue" />


    </div>
  </div>
    <div class="login-center">
      <div class="login-form">
        <p class="login">Login to start your session</p>
                
      <div>
    </div>
    <form method="post">
      <div class="form-group">
        <label class="label"><i class="fas fa-user"></i> Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $email?>" placeholder="Enter your email address" aria-describedby="emailHelp" required />
        
      </div><br>
      <div class="form-group">
        <label class="label"><i class="fas fa-lock"></i> Password</label>
        <input type="password" name="password" placeholder="Enter your password" class="form-control" required/>
        
      </div>
      <button type="submit" class="button" name="login"> 
        Login
        <i class="fas fa-sign-in-alt"></i></span>
      </button>
    </form>
    <?php echo $message?>
     
  <!--nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: white;">
    <div class="container-fluid">
      <div class="navbar-header">
      </div>
          <ul class="nav navbar">
            <li class="active"><img src="pg.jpg" alt="logo" width="85"></li>
            
          </ul>
            
    </div>
  </nav><br><br>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button name="login" class="btn btn-info btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
          <!--a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a-->
        </div>
      </div>
    </div>
  </div-->

 

</body>

</html>
