<?php include "includes/head.php";
if (in_array(1, $user) || in_array(11, $user) || in_array(13, $user)) {
    $start = $_GET["start_date"];
    $end = $_GET["end_date"];
?>
 <?php
 error_reporting(0);
   include"../conn.php";
   $message = '';

  if (isset($_POST['update'])) {
     $invoiceno=$_POST['invoiceno'];
     $appno=$_POST['appno'];
     $sessionadmin=$_POST['sessionadmin'];
     $sessiongrad=$_POST['sessiongrad'];
     $comments =$_POST['comments'];
 
     $sql="INSERT INTO trans_docs(invoiceno, appno, sessionadmin, sessiongrad, comments, name, section, update_time, status) VALUES('$invoiceno', '$appno', '$sessionadmin', '$sessiongrad', '$comments', '$officer', '$tasks', now(), 'comment')";
    $conn->query($sql);
    $last_id = mysqli_insert_id($conn);
    if ($last_id) {
        
        $message = " <div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Comment successfully made!
            </div>";
       
    }else{
        
         $message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Unable to make comment!
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
                <?php if (!empty($start) && !empty($end)) {
                    ?>
                        <a href="filter.php?start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                    <?php }else{?>
                        <a href="processing.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                    <?php }?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
                <?php 
                        $invoice = base64_decode($_GET["edit"]);

                        $payments = getPaymentDetails($invoice);
                        foreach ($payments as $value) {
                            $appno = $value['appno'];
                        }
                        $students = getData($appno);
                        foreach ($students as $student) {
                            
                        }
                        
                        ?>
             <section class="content">
                <div class="row">
                <?php echo $message?>
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Candidate Information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        </div>
                        </div>
                        <div class="card-body">
                        <form method="POST">
                        <div class="form-group">
                            <label for="inputName">Invoice No.</label>
                            <input type="text" id="inputName" name="invoiceno" value="<?php echo $value['invoiceno']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Matric No.</label>
                            <input type="text" id="inputName" name="appno" value="<?php echo $value['appno']?>" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputClientCompany">Session Admitted</label>
                            <input type="text" id="inputClientCompany" name="sessionadmin" value="<?php echo $student['sessionadmin']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Session Graduate</label>
                            <input type="text" id="inputProjectLeader" name="sessiongrad" value="<?php echo $student['sessiongrad']?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="comment">Description</label>
                            <textarea name="comments" id="compose-textarea" class=""></textarea>
                        </div>
                        <input type="submit" value="Make Comment" name="update" class="btn btn-success float-right">
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

<?php include "includes/footer.php"?>
<?php } else{?>
<?php 
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>