<?php include "includes/head.php";

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
              <h3 class="card-title">Filter by date</h3>
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
                if ($tasks == 1 || $tasks == 13) {
                    $flag = 4;
                }elseif ($tasks == 2) {
                    $flag = 0;
                }elseif ($tasks == 9) {
                    $flag = 1;
                }elseif ($tasks == 10) {
                    $flag = 2;
                }elseif ($tasks == 11) {
                    $flag = 3;
                }
                    $start = $_GET["start_date"];
                    $end = $_GET["end_date"];
                    $requests = getFilter($flag, $start, $end);
                    foreach ($requests as $value) {

                ?>
                <tr>
                    <td><?php echo $value['appno']?></td>
                    <td><?php echo $value['purpose']?></td>
                    <td><?php echo $value['paid_time']?></td>
                    <td style="text-align: center;">
                   <?php
                        if ($flag == 1) {
                        
                   ?>
                      <a href="fcomment.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-warning" style="color:white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Notify student"><i class="fa fa-comment"></i> </a>
                      <a href="fprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Dispatch"><i class="fa fa-check"></i></a> 

                      <?php }elseif ($flag == 2) {?>
                        <a href="rcomment.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-warning" style="color:white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Notify student"><i class="fa fa-comment"></i> </a>
                        <a href="rprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Dispatch"><i class="fa fa-check"></i></a> 
                        
                        <?php }elseif ($flag == 3) {?>
                            <a href="pcomment.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-warning" style="color:white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Notify student"><i class="fa fa-comment"></i> </a>
                            <a href="pprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="Dispatch"><i class="fa fa-check"></i></a> 
                    
                        <?php }elseif ($flag == 4) {?>
                            <a href="show_payment.php?pin=<?php echo base64_encode($value['invoiceno'])?>&uim=<?php echo base64_encode($value['appno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-info" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view details"><i class="fa fa-edit"></i></a>
                    
                            <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/notification_doc/<?php echo getNotification($value['appno'])?>" target="_blank" class="btn btn-primary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view notification of result"><i class="fa fa-file"></i></a>
                            
                            <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/wes_doc/<?php echo getWes($value['appno'])?>" target="_blank" class="btn btn-secondary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view wes form"><i class="fa fa-folder"></i></a>
                            
                            <a href="sprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="process request"><i class="fa fa-check"></i></a> 
                        <?php }elseif ($flag == 0) {?>
                            
                                <a href="show.php?pin=<?php echo base64_encode($value['invoiceno'])?>&uim=<?php echo base64_encode($value['appno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-info" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view details"><i class="fa fa-edit"></i></a>
              
                                <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/notification_doc/<?php echo getNotification($value['appno'])?>" target="_blank" class="btn btn-primary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view notification of result"><i class="fa fa-file"></i></a>
                                
                                <a href="https://transcriptupload.s3.eu-central-1.amazonaws.com/wes_doc/<?php echo getWes($value['appno'])?>" target="_blank" class="btn btn-secondary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view wes form"><i class="fa fa-folder"></i></a>
                                
                                <a href="process.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="process request"><i class="fa fa-check"></i></a> 
                                
                                <a href="comment.php?edit=<?php echo base64_encode($value['invoiceno']);?>&start_date=<?php echo $start?>&end_date=<?php echo $end?>" class="btn btn-warning" style="color:white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="comment"><i class="fa fa-comment"></i> </a>
                    <?php }?>
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


        <footer class="main-footer">
            <strong>Copyright &copy; <?php echo date("Y")?> <a href="#">PGC ICT</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.0
            </div>
         </footer>

        <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
        <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
