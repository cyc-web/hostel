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
                    <h1 class="m-0 text-dark">Comment Dashboard</h1>
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
              <h3 class="card-title">All feedbacks</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>MATRIC</th>
               <th>TREATED BY</th>
               <th>SECTION</th>
               <th>DATE</th>
               <th class="text-center">ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php include "../conn.php";

                $sql="SELECT * FROM trans_docs WHERE status = 'comment'";
                if($result=$conn->query($sql)){
                  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
                    # code...
                    $section = $row['section'];
                    if ($section == 1 || $section == 13) {
                       $section = 'Admin';
                    }elseif ($section == 2) {
                        # code...
                        $section = 'Information Office';
                    
                    }elseif ($section == 9) {
                        # code...
                        $section = 'Filing Office';
                    
                    }elseif ($section == 10) {
                        # code...
                        $section = 'Result Office';
                    
                    }elseif ($section == 11) {
                        # code...
                        $section = 'Process Office';
                    
                    }


          ?>
                <tr>
                <td><?php echo $row['appno']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $section; ?></td>
              <td><?php echo $row['update_time']; ?></td>
              <td class="text-center"><a href="viewComment.php?edit=<?php echo base64_encode($row['id']);?>" class="btn btn-primary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="view">view</a> 
          
            </td>
                </tr>
                <?php }}?>
                </tbody>
                <tfoot>
                <tr>
                  <th>MATRIC</th>
               <th>TREATED BY</th>
               <th>SECTION</th>
               <th>DATE</th>
               <th class="text-center">ACTION</th>
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