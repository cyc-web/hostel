<?php include "includes/head.php";
error_reporting(0);
$start = $_GET["start_date"];
$end = $_GET["end_date"];
?>
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
                            <?php if (!empty($start) && !empty($end)) {
                            ?>
                                <a href="filter.php?start_date=<?php echo $start ?>&end_date=<?php echo $end ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> back</a>
                            <?php } else { ?>
                            <?php } ?>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li> <button class="btn btn-success" onclick="window.print();">print</button></li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?php include "conn.php";
            $invoice = base64_decode($_GET["id"]);
            $appno = base64_decode($_GET["uim"]);
            $sql = "SELECT * FROM biodata  WHERE id= '$invoice'";
            $result = $conn->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            ?>
            <section class="content" style="border: 1px solid black; max-width:800px; margin:auto; padding:10px">
                <div class="">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="../uploads/<?php echo $row['form_no'] ?>" width="70" class="img-rounded" alt="">
                        </div>
                        <div class="col-md-9">

                            <h3 style="color: navy;">THE POLYTECHNIC OF IBADAN, IBADAN NIGERIA.</h3>
                            <h4 style="color: tomato; text-align:center">OLORI HALL OF RESIDENCE</h4>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <table width="100%">
                        <tr>
                            <th class="record">Name</th>
                            <td class="record"><span style="text-transform: uppercase;"><?php echo $row['surname'] ?></span> <?php echo $row['othername'] ?></td>
                            <th style="float: right;">Form. No:</th>
                            <td class="record"><?php echo $row['form_no'] ?></td>

                        </tr>
                        <tr>
                            <th class="record">Department</th>
                            <td class="record"><?php echo $row['department'] ?></td>
                            <th style="float: right;">Date Applied:</th>
                            <td class="record"><?php echo $row['date_apply'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Level</th>
                            <td class="record"><?php echo $row['degree'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Religion</th>
                            <td class="record"><?php echo $row['religion'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Telephone</th>
                            <td class="record"><?php echo $row['phone'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Parent</th>
                            <td class="record"><?php echo $row['parent'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Block</th>
                            <td class="record"><?php echo $row['room_category'] ?></td>
                        </tr>
                        <tr>
                            <th class="record">Room</th>
                            <td class="record"><?php echo getRoom($row['room']) ?></td>
                        </tr>

                    </table>
                    <div style="text-align: center; margin-top: 20px; font-size: 16px">

                        <p>Disability Status</p>
                        <table class="record div" style="margin-left: 70px;">
                            <tr>
                                <th class="record">Disabled?</th>
                                <th class="record">Issue</th>
                            </tr>
                            <tr>
                                <td class="record"><?php echo $row['dissability'] ?> </td>

                                <td class="record"><?php echo $row['dissability'] == 'Yes' ? $row['form'] : 'None' ?></td>
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

    <?php include 'includes/footer.php' ?>
</body>

</html>