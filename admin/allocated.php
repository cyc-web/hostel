<?php include "includes/head.php";
if (in_array(1, $user) || in_array(2, $user) || in_array(13, $user)) {

?>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php include "includes/navbar.php" ?>
            <?php include "includes/sidebar.php" ?>
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
                    <div class="row">
                        <div class="col-md-6 text-right">
                        </div>
                        <div class="col-md-6 text-right" style="padding-right: 20px;">
                            <button class="btn btn-danger" type="submit" style="margin-top: 2px; margin-right: 10px;" onClick="setDeleteAction();"><i class="fa fa-trash"></i> Delete</button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" name="frmUser" action="">

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="select_all"></th>
                                        <th>ID NO.</th>
                                        <th>NAME</th>
                                        <th>DEPARTMENT</th>
                                        <th>LEVEL </th>
                                        <th>BLOCK / (ROOM) </th>
                                        <th>PASSPORT</th>
                                        <th style="text-align: center;">ACTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="select_all"></th>
                                        <th>ID NO.</th>
                                        <th>NAME</th>
                                        <th>DEPARTMENT</th>
                                        <th>LEVEL </th>
                                        <th>BLOCK / (ROOM)</th>
                                        <th>PASSPORT</th>
                                        <th style="text-align: center;">ACTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php include "conn.php";

                                    $sql = "SELECT * FROM biodata WHERE status = '1'";
                                    if ($result = $conn->query($sql)) {
                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            # code...


                                    ?>
                                            <tr>
                                                <td class="text-center"><input type="checkbox" name="id[]" value="<?php echo $row['id'] ?>" id="">
                                                    <input type="hidden" name="room[]" value="<?php echo $row['room'] ?>" id="">

                                                </td>
                                                <td><?php echo $row['form_no']; ?></td>
                                                <td><?php echo $row['surname'];
                                                    echo ' ';
                                                    echo $row['othername']; ?></td>
                                                <td><?php echo $row['department']; ?></td>
                                                <td><?php echo $row['degree']; ?></td>


                                                <td><?php echo $row['room_category'];
                                                    echo ' ';
                                                    echo '(';
                                                    echo ' ';
                                                    echo getRoom($row['room']);
                                                    echo ')'; ?></td>
                                                <td class="text-center"><a href="../uploads/<?php echo $row['form_no'] ?>" target="_blank"><img src="../uploads/<?php echo $row['form_no'] ?>" width="40" class="img-rounded" alt=""></a></td>
                                                <td style="text-align: center;"><a href="show.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary" style="color: white;text-decoration: none;" data-toggle="tooltip" data-placement="top" title="View request"><i class="fa fa-edit"></i></a>


                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <?php include 'includes/footer.php' ?>

        <script type="text/javascript">
            function setDeleteAction() {
                if (confirm("Are you sure want to delete these request (s)?")) {
                    document.frmUser.action = "rejectMoreApp.php";
                    document.frmUser.submit();
                }
            }

            function setUpdateAction() {
                if (confirm("Are you sure want to approve these request (s)?")) {
                    document.frmUser.action = "approveMore.php";
                    document.frmUser.submit();
                }
            }

            function setEditAction() {
                if (confirm("Are you sure want to unlock these rooms?")) {
                    document.frmUser.action = "";
                    document.frmUser.submit();
                }
            }
        </script>
    </body>

    </html>
<?php } else { ?>
    <?php
    echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php } ?>
<?php
function getRoom($id)
{
    include "conn.php";
    $sql = "SELECT * FROM room WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['room'];
}
?>