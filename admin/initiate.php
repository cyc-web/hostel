<?php include "includes/head.php";

?>
<?php
include "conn.php";
$message = '';

if (isset($_POST['submit'])) {
    $matric = $_POST['matric'];
            $check = "SELECT * FROM room WHERE status='0' ORDER BY RAND() LIMIT 1";
            $res = $conn->query($check);
            $ro = $res->fetch_array(MYSQLI_ASSOC);
            if ($ro) {
                $room = $ro['id'];
                $room_category = $ro['room_category'];
                $check = "SELECT * FROM biodata WHERE form_no='$matric'";
                $result = $conn->query($check);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if ($row) {
                    echo "<script>alert('Form / Matric already exist');</script>";
                }else {
                
                    $sql ="INSERT INTO `biodata`(`form_no`, `room`, `room_category`)VALUE('$matric', '$room', '$room_category')";
                    $conn->query($sql);
                    $last_id = mysqli_insert_id($conn);
                    $updateRoom = "UPDATE room SET status='1' WHERE id ='$room'";
                    $conn->query($updateRoom);
                    if ($last_id) {
                        echo "<script>alert('Registration Initiated Successfully');</script>";
                    }else {
                        echo "<script>alert('Registration Initiated Failed');</script>";
                    }
                }
            }else {
                echo "<script>alert('No more available room');</script>";
            }

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
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Initiate Registration</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST">

                                    <div class="form-group">
                                        <label for="inputName">Form / Matric Number</label>
                                        <input type="text" id="inputName" name="matric" value="" class="form-control" required>
                                    </div>
                                   
                                    <input type="submit" value="Submit" name="submit" class="btn btn-success float-right">
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>

            </section>
        </div>


        <?php include "includes/footer.php"; ?>