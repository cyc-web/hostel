 <?php include 'includes/head.php';
 ?>
<?php
                $message = '';
                include '../conn2.php';
                    if(isset($_POST['create'])){
                        $check = "SELECT unit FROM unit WHERE unit ='".$_POST["unit"]."'";
                        $result = $conn->query($check);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        if ($row) {
                            # code...
                            $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                Unit already exist.
                                </div>";
                        }else{
                        $unit = $_POST['unit'];
                        $sql = "INSERT INTO unit (unit, user_id) VALUES('$unit', '$user_id')";
                        $conn->query($sql);
                        $last_id = mysqli_insert_id($conn);
                        if ($last_id) {
                            $message = "<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                     New unit created successfully.
                                </div>";
                        }else{
                            $message = "<div class='alert2'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
                                Unable to create new unit.
                                </div>";
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
                    <h1 class="m-0 text-dark">Units</h1>
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
            </section>
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Units</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php echo $message?><br>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-secondary">Create Unit</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-danger" type="submit" style="margin-top: 2px; margin-right: 10px;" onClick="setDeleteAction();"><i class="fa fa-trash"></i> Delete</button>  
                    </div>
                </div><br>
                <form method="POST" name="frmUser" action="">
                    
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select_all"> Select All</th>
                                <th>Matric</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                $units = getUnit();
                foreach($units as $unit){
                    
                    ?>
               <tr>
                   <td><input type='checkbox' name='id[]' value='<?php echo $unit['id']?>'>
                   <input type='hidden' name='user' value='<?php echo $user_id?>'>
                </td>
                <td><?php echo $unit["unit"]?></td>
                <td><?php echo $unit["created_at"]?></td>
                <td class="text-center">
                    <a href="edit_unit.php?Id=<?php echo base64_encode($unit['id'])?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
               
              </table>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
           

    <div class="modal" id="modal-secondary">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-home"></i> Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form role="form" action="unit.php" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                        

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Unit Name</label>
                                    <input name="unit" id="" type="text" class="form-control" value="" require>
                                </div>

                                    
                        
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="create">Create Unit</button>
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
        document.frmUser.action = "deletes/delete_unit.php";
        document.frmUser.submit();
    }
}

</script>
<?php include 'includes/footer.php'?>
     