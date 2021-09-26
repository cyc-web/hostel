<?php include "includes/head.php";
if (in_array(1, $user) || in_array(10, $user) || in_array(13, $user)) {

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
                    $requests = getResultRequest();
                    foreach ($requests as $value) {

                ?>
                <tr>
                    <td><?php echo $value['appno']?></td>
                    <td><?php echo $value['purpose']?></td>
                    <td><?php echo $value['paid_time']?></td>
                    <td style="text-align: center;">
                   
                    <a href="rprocess.php?edit=<?php echo base64_encode($value['invoiceno']);?>" class="btn btn-success" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="process request"><i class="fa fa-plus"></i></a> 
                    
                    <a href="rcomment.php?edit=<?php echo base64_encode($value['invoiceno']);?>" class="btn btn-warning" style="color:white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="comment"><i class="fa fa-comment"></i> </a>
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
<?php } else{?>
<?php 
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>