<?php include 'includes/head.php'?>
                <?php
                include"../conn.php";
                $message = '';
                $id = base64_decode($_GET["Id"]);
            
                        $check = "SELECT * FROM courier_admin WHERE id ='$id'";
                        $result = $conn->query($check);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $status = $row['deleted_at'];
                        $units = $row['section'];

                        if (isset($_POST['update'])) {
                           $role_id = $_POST['role_id'];
                           //var_dump($role_id);
                           if ($role_id && empty($status)) {
                               $update = "UPDATE courier_admin SET deleted_at= now(), deleted_by ='$user_id' WHERE id='$id'";
                            }else{
                                $update = "UPDATE courier_admin SET deleted_at=NULL, deleted_by ='$user_id', updated_at = now() WHERE id='$id'";
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
                    <li class="breadcrumb-item"><a href="courier.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a></li>
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
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" id="inputName" name="name" value="<?php echo $row['name']?>" placeholder="Enter new task" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" id="inputName" name="email" value="<?php echo $row['email']?>" placeholder="Enter new task" class="form-control" readonly>
                                        </div>
                                        
                                        
                                    
                                        <div class="form-group">
                                            <label for="inputName">Telephone</label>
                                            <input type="text" id="inputName" name="telephone" value="<?php echo $row['telephone']?>" placeholder="Enter new task" class="form-control" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputName">Channel</label>
                                            <input type="text" id="inputName" name="channel" value="<?php echo $row['section']?>" placeholder="Enter new task" class="form-control" readonly>
                                        </div>
                                        
                                    
                                        <div class="form-group">
                                            <input type="checkbox" name="role_id" value="<?php echo $row['id']?>"> <?php echo !empty($row['deleted_at']) ? 'Activate' : 'Deactivate'?> 
                                            
                                        </div>
                                            
                                        <input type="submit" value="Update User" name="update" class="btn btn-success float-right">
                                    </div>
                                        
                                
                            
                    </div>

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
     