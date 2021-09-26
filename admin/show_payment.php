<?php 
error_reporting(0);
include "includes/head.php";
if (in_array(1, $user) || in_array(13, $user)) {
    $start = $_GET["start_date"];
    $end = $_GET["end_date"];
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
                        <a href="dashboard.php" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                    <?php }?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li> <button class="btn btn-success" onclick="window.print();">print</button></li>
                    
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <section class="content" style="border: 1px solid black; max-width:800px; margin:auto; padding:10px">
                <div class="">
                    <div class="row">
                    <div class="col-md-3 text-center">
                    <img src="../uilogo.jpg" style="height: 70px;">
                    </div>
                    <div class="col-md-9">
                    
                        <h3 style="color: navy;">UNIVERSITY OF IBADAN, IBADAN NIGERIA.</h3>
                    <h4 style="color: tomato;">Payment Details</h4>
                    </div>
                    </div>
                    </div>
                        <?php include"../conn.php";
                        $invoice = base64_decode($_GET["pin"]);
                        $appno = base64_decode($_GET["uim"]);

                        $payments = getPaymentDetails($invoice);
                        foreach ($payments as $value) {
                        }
                        $students = getData($appno);
                        foreach ($students as $student) {
                            
                        }
                        $couriers = getCourier($appno);
                        foreach ($couriers as $courier) {
                        
                        }
                        ?>
                        
                        <div style="margin-top: 15px;">
                            <table width="100%">
                            <tr>
                                <th class="record">Name</th>
                                <td class="record"><span style="text-transform: uppercase;"><?php echo $student['Surname']?></span> <?php echo $student['Othernames']?></td>
                                <th style="float: right;">Matric. No:</th>
                                <td class="record"><?php echo $appno?></td>

                            </tr>
                            <tr>
                                <th class="record">Maiden</th>
                                <td class="record"><?php echo $student['maiden']?></td>
                                <th style="float: right;">Purpose:</th>
                                <td class="record"><?php echo $value['purpose']?></td>
                            </tr>
                            <tr>
                                <th class="record">Sex</th>
                                <td class="record"><?php echo $student['sex']?></td>
                                <th style="float: right;">Amount paid:</th>
                                <td class="record"><?php echo $value['amount_paid']?></td>
                            </tr>
                            <tr>
                                <th class="record">Faculty</th>
                                <td class="record"><?php echo $student['faculty']?></td>
                                <th style="float: right;">Ref. No:</th>
                                <td class="record"><?php echo $value['invoiceno']?></td>
                            </tr>
                            <tr>
                                <th class="record">Department</th>
                                <td class="record"><?php echo $student['department']?></td>
                                <th style="float: right;">Date paid:</th>
                                <td class="record"><?php echo $value['paid_time']?></td>
                            </tr>
                            <tr>
                                <th class="record">Session Admitted</th>
                                <td class="record"><?php echo $student['sessionadmin']?></td>
                            </tr>
                            <tr>
                                <th class="record">Session Graduated</th>
                                <td class="record"><?php echo $student['sessiongrad']?></td>
                            </tr>
                            
                            </table>
                                <div style="text-align: center; margin-top: 20px; font-size: 16px">
                               
                                    <p>Destination address and records</p>
                                    <table class="record div" style="margin-left: 70px;">
                                        <tr>
                                        <th class="record">Destination address</th>
                                        <th class="record">Student records</th>
                                        </tr>
                                        <tr>
                                        <td class="record"><?php echo $courier['address']?> <br><?php echo $courier['destination']?></td>
                                       
                                        <td class="record"><?php echo $student['email']?> <br><?php echo $student['Telephone']?></td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
            </section>
         
          <br><br><br><br><br><br>
          </div>
           
        </div>



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
      "ordering": true,
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