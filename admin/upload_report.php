<?php include 'includes/head.php'?>

   

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
       <?php include 'includes/navbar.php'?>
       <?php include 'includes/sidebar.php'?>
        
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
            <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php 
           
                $reports = getResultUser();
                foreach ($reports as $report) {
                
            ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total number of record uploaded <br> by <?php echo getUserName($report['user'])?> <?php echo getUserOName($report['user'])?></span>
                <span class="info-box-number" style="color:red">
                  <?php echo getTotalUpload($report['user']) ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php }?>
         
         
        </div>
        <!-- /.row -->

        
      </div><!--/. container-fluid -->
    </section>
        </div>
    </div>
</body>

<?php include 'includes/footer.php'?>
     