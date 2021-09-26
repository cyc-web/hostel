<?php include "includes/head.php";

?>
<?php 
error_reporting(0);
include"../conn2.php";
  $message = '';
  
 if (isset($_POST['submit'])) {

    $secret=md5($_POST['secret']);
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    if ($secret == $current_password) {
        if ($password == $cpassword) {
            $update ="UPDATE admin SET password = '$password' WHERE id ='$user_id'"; 
            if ($conn->query($update)) {
                $message = " <div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Password successfully changed!
            </div>";
            }else{
                $message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Unable to change password!
            </div>";
            }
        }else{
            $message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Password does not match!
            </div>";

        }
    }else{
        $message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Invalid password!
            </div>";
    }


    
 }
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "includes/navbar.php"?>
        <?php include "includes/sidebar.php"?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a></li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                <?php echo $message?>
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Change your password?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <form method="POST">
                        
                        <div class="form-group">
                            <label for="inputName">Current Password</label>
                            <input type="password" id="inputName" name="secret" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">New Password</label>
                            <input type="password" id="inputName" name="password" value="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Confirm Password</label>
                            <input type="password" id="inputName" name="cpassword" value="" class="form-control" required>
                        </div>
                        
                       
                        <input type="submit" value="Change Password" name="submit" class="btn btn-success float-right">
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                
                </div>
                
            </section>
</div>


       <?php include"includes/footer.php";?>
