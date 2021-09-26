<?php include "includes/head.php";
if (in_array(1, $user) || in_array(2, $user) || in_array(13, $user)) {

?>
<?php 
error_reporting(0);
  include ('../conn.php');
  $message = '';
  
 if (isset($_POST['submit'])) {

    $invoiceno=$_POST['invoiceno'];
    $appno=$_POST['appno'];
    $comment='Your transcript has been dispatched';
    $update_time = date("Y-m-d H:i:s");
    
    $sql="UPDATE transinvoice SET invoice_flag ='6' WHERE invoiceno='$invoiceno'";
    $sql1="UPDATE trans_docs SET status ='dispatched' WHERE invoiceno='$invoiceno'";
    $sql2="UPDATE dispatch_office SET status='dispatched', comment='$comment' WHERE invoiceno='$invoiceno'";
         $conn->query($sql);
         $conn->query($sql1);
         $conn->query($sql2);
         $email = getEmail($appno);
         $user = getSurname($appno);
         $user2 = getOname($appno);
         //$mail = sendMail($email, $user, $user2, $comment, $officer, $update_time);
         
     echo "<script>alert('Transcript successfully dispatched! ".$update_time."');</script>";
     echo "<script>window.open('dispatch.php', '_self');</script>";

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
                <a href="dispatch.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
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
                        // $couriers = getCourier($appno);
                        // foreach ($couriers as $courier) {
                        
                        // }
                        ?>
             <section class="content">
                <div class="row">
                <?php echo $message?>
                <div class="col-md-3"></div>
                    <div class="col-md-6">
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
                        
                        
                        <input type="submit" value="Dispatch" name="submit" class="btn btn-success float-right">
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