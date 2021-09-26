 <?php include 'includes/head.php'?>
                <?php
                $message = '';
                $id = base64_decode($_GET["Id"]);
                include '../conn2.php';
            
                        $check = "SELECT id,unit FROM unit WHERE id ='$id'";
                        $result = $conn->query($check);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                        if (isset($_POST['update'])) {
                           $unit = $_POST['unit'];
                           $update = "UPDATE unit SET unit ='$unit', user_id='$user_id', updated_at = now() WHERE id='$id'";
                           if ($conn->query($update)) {
                               $message = "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                     Unit updated successfully.
                                </div>";
                           }else{
                               $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                Unable to update unit.
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
                    <h1 class="m-0 text-dark">Edit Unit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="unit.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a></li>
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
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Unit Information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <form method="POST">
                        
                        <div class="form-group">
                            <label for="inputName">Unit</label>
                            <input type="text" id="inputName" name="unit" value="<?php echo $row['unit']?>" placeholder="Enter new task" class="form-control" require>
                        </div>
                        
                    
                        <input type="submit" value="Update Unit" name="update" class="btn btn-success float-right">
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
     