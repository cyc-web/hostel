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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>
</body>
</html>
