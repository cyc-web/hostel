 <?php
 error_reporting(0);
 include 'includes/head.php'?>
                <?php
                $message = '';
                $id = base64_decode($_GET["Id"]);
            
                        $check = "SELECT * FROM admin WHERE id ='$id'";
                        $result = $conn->query($check);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $status = $row['deleted_at'];
                        $units = $row['role_id'];
                        $users = explode(",", $units);

                        if (isset($_POST['update'])) {
                           $name = $_POST['name'];
                           $othername = $_POST['othername'];
                           $email = $_POST['email'];
                           $telephone = $_POST['telephone'];
                           $role_id = $_POST['role_id'];
                           $unit = $_POST['unit'];
                           $newUnit = implode(",",$unit);
                           if ($role_id && empty($status)) {
                               
                               $update = "UPDATE admin SET name ='$name', othername ='$othername', email ='$email', telephone ='$telephone', role_id ='$newUnit', deleted_at= now(), deleted_by ='$user_id' WHERE id='$id'";
                            }else{
                            
                                $update = "UPDATE admin SET name ='$name', othername ='$othername', email ='$email', telephone ='$telephone', role_id ='$newUnit', deleted_at=NULL, deleted_by ='$user_id', updated_at = now() WHERE id='$id'";
                           }
                           if ($conn->query($update)) {
                               $message = "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                     User updated successfully.
                                </div>";
                           }else{
                               $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                Unable to update user.
                                </div>";
                           }
                        }   
                                            
                ?>

   

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
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="users.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a></li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
           <section class="content">
               <?php echo $message?><br>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">User Information</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="row">

                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="inputName">Surname</label>
                                            <input type="text" id="inputName" name="name" value="<?php echo $row['name']?>" placeholder="Enter new task" class="form-control" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" id="inputName" name="email" value="<?php echo $row['email']?>" placeholder="Enter new task" class="form-control" require>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Othernames</label>
                                            <input type="text" id="inputName" name="othername" value="<?php echo $row['othername']?>" placeholder="Enter new task" class="form-control" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Telephone</label>
                                            <input type="text" id="inputName" name="telephone" value="<?php echo $row['telephone']?>" placeholder="Enter new task" class="form-control" require>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="role_id" value="<?php echo $row['id']?>"> <?php echo !empty($row['deleted_at']) ? 'Activate' : 'Deactivate'?> 
                                            
                                        </div>
                                            
                                    </div>
                                        
                                </div>
                                <div class="row">
                                    
                                    <?php
                                        $tasks = getUnit();
                                        foreach ($tasks as $value) {
                                            
                                            ?>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="checkbox" name="unit[]" value="<?php echo $value['id']?>" id=""
                                            <?php
                                                foreach ($users as $key) {
                                                    if ($key == $value['id']) {      
                                                        
                                            ?>
                                                checked
                                                <?php }}?>
                                                > <?php echo $value['unit']?>
                                        </div>
                                            
                                    </div>
                                        
                                        <?php }?>
                                </div>
                                    <input type="submit" value="Update User" name="update" class="btn btn-success float-right">
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                </div>
                
            </section>
        </div>
    </div>

<?php include 'includes/footer.php'?>
     