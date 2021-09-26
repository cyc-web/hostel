 <?php
 error_reporting(0);
 include 'includes/head.php';
 ?>
<?php
                $message = '';
                    if (isset($_POST['create'])) {
                        # code...
                    $sq ="SELECT email FROM admin WHERE email = '".$_POST['email']."'";
                    $re = $conn->query($sq);
                    $ro = $re->fetch_array(MYSQLI_ASSOC);
                    if ($ro) {
                        $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                User with the email already exist.
                                </div>";
                    }else{
                        $surname=$_POST['name'];
                        $othername=$_POST['othername'];
                        $email=$_POST['email'];
                        $telephone = $_POST['telephone'];
                        $password=md5($_POST['password']);
                        $cpassword=md5($_POST['cpassword']);
                        if ($password != $cpassword) {
                             $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                               Password do not match
                                </div>";
                        }else{
                          
                        $sql="INSERT INTO admin (name, othername, email, telephone, password, role_id)VALUES('$surname', '$othername', '$email', '$telephone', '$password', '2')";
                        $conn->query($sql);
                        $last_id = mysqli_insert_id($conn);
                        if ($last_id) {
                            $message = "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                     New user created successfully.
                                </div>";
                        }else{
                            $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                Unable to create new user.
                                </div>";
                        }
                    }
                    }
                    }
                ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document) .ready(function(){
    $('#select_all') .click(function(){
      $('input[type="checkbox"]') .prop('checked', this.checked);
    });
  });
</script>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
       <?php include 'includes/navbar.php'?>
       <?php include 'includes/sidebar.php'?>
        
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a></li>
                    
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
            </section>
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">All users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo $message?><br>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-secondary">Create User</button>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
                <form method="POST" name="frmUser" action="">
                    <?php if (in_array(1, $user)) {
                        # code...
                    ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                $users = getUsers($user_id);
                foreach($users as $unit){
                    
                    ?>
               <tr>
                  
                <td><?php echo $unit["name"]; echo ' '; echo $unit['othername']?></td>
                <td><?php echo $unit["email"]?></td>
                <td><?php echo $unit["telephone"]?></td>
                <td><?php echo empty($unit["deleted_at"])? "<p class='btn btn-success'>Active</p>":"<p class='btn btn-danger'>Dissabled</p>"; ?></td>
                <td class="text-center">
                    <a href="edit_user.php?Id=<?php echo base64_encode($unit['id'])?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
               
              </table>
              <?php } else{?>
                <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                $users = getUser($user_id);
                foreach($users as $unit){
                    
                    ?>
               <tr>
                
                <td><?php echo $unit["name"]; echo ' '; echo $unit['othername']?></td>
                <td><?php echo $unit["email"]?></td>
                <td><?php echo $unit["telephone"]?></td>
                <td><?php echo empty($unit["deleted_at"])? "<p class='btn btn-success'>Active</p>":"<p class='btn btn-danger'>Dissabled</p>"; ?></td>
                <td class="text-center">
                    <a href="edit_user.php?Id=<?php echo base64_encode($unit['id'])?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
               
              </table>
                <?php }?>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
           

    <div class="modal" id="modal-secondary">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-user"></i> User Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form role="form" action="users.php" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                        

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Surname</label>
                                    <input name="name" id="" type="text" class="form-control" value="" require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Othername</label>
                                    <input name="othername" id="" type="text" class="form-control" value="" require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="email" id="" type="text" class="form-control" value="" require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone</label>
                                    <input name="telephone" id="" type="text" class="form-control" value="" require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input name="password" id="" type="password" class="form-control" value="" require>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input name="cpassword" id="" type="password" class="form-control" value="" require>
                                </div>
                                    
                        
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="create">Create User</button>
                        </div>
                
                    </form>
          </div>
          <!-- /.modal-content -->
        </div>
    </div>
</div>
 

<script type="text/javascript">
function setDeleteAction() {
    if(confirm("Are you sure want to delete these records?")) {
        document.frmUser.action = "deletes/delete_user.php";
        document.frmUser.submit();
    }
}

</script>
<?php include 'includes/footer.php'?>
     