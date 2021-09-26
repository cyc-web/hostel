<?php include "includes/head.php";
if (in_array(1, $user) || in_array(13, $user)) {

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
           
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Transcript Request</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Matric</th>
                  <th>Purpose</th>
                  <th>Date</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $requests = getSignRequest();
                    foreach ($requests as $value) {

                ?>
                <tr>
                    <td><?php echo $value['appno']?></td>
                    <td><?php echo $value['purpose']?></td>
                    <td><?php echo $value['paid_time']?></td>
                    <td style="text-align: center;"><a href="show_payment.php?pin=<?php echo base64_encode($value['invoiceno'])?>&uim=<?php echo base64_encode($value['appno']);?>" class="btn btn-info" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view details"><i class="fa fa-edit"></i></a>
              
                    <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/notification_doc/<?php echo getNotification($value['appno'])?>" target="_blank" class="btn btn-primary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view notification of result"><i class="fa fa-file"></i></a>
                    
                    <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/wes_doc/<?php echo getWes($value['appno'])?>" target="_blank" class="btn btn-secondary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view wes form"><i class="fa fa-folder"></i></a>
                    
                    <a href="sprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="process request"><i class="fa fa-check"></i></a> 
                    
                    </td>
                </tr>
                <?php }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Matric</th>
                  <th>Purpose</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
           
        </div>


       <?php include"includes/footer.php";?>
<?php } else{?>
<?php 
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>