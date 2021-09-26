<?php
 require '../vendor/autoload.php'; // If you're using Composer (recommended)
 include "includes/head.php";
if (in_array(1, $user) || in_array(2, $user) || in_array(13, $user)) {

?>
 <?php
 $message = '';
 if (isset($_POST['update'])) {
    # code...
    $invoiceno=$_POST['invoiceno'];
     $appno=$_POST['appno'];
     $address=$_POST['address'];
     $country=$_POST['country'];
     $comments =$_POST['comments'];
     $channel = $_POST['channel'];
 
     $sql="INSERT INTO dispatch_office(appno, degree, comment, destination_address, destination_country, channel, name, update_time,receive_time, status, invoiceno)VALUES('$appno', '', '$comments', '$address', '$country', '$channel', '$officer', now(), '', 'ready', '$invoiceno')";
    
    $conn->query($sql);
    $last_id = mysqli_insert_id($conn);
    if ($last_id) {

    $surname = getSurname($appno);
    $othername = getOname($appno);
    $update_time = date("Y-m-d H:i:s");
    //$time = getTime($last_id);
    $emails = getEmail($appno);
    sendMail($emails, $surname, $othername, $comments, $officer, $update_time);
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
                            $invoice = $value['invoiceno'];
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
                            <label for="inputClientCompany">Address</label>
                            <input type="text" id="inputClientCompany" name="address" value="<?php echo getAddress($invoice)?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Country</label>
                            <input type="text" id="inputProjectLeader" name="country" value="<?php echo getCountry($invoice)?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Channel</label>
                            <input type="text" id="inputProjectLeader" name="channel" value="<?php echo getChannel($invoice)?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="comment">Description</label>
                            <textarea name="comments" id="compose-textarea" class="">Your transcript is ready for pick up please contact your selected courier agent on</textarea>
                        </div>
                        <input type="submit" value="Notify Student" name="update" class="btn btn-success float-right">
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