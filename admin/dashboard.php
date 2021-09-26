 <?php include 'includes/head.php' ?>

 <body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper">
         <?php include 'includes/navbar.php' ?>
         <?php include 'includes/sidebar.php' ?>
         <?php if ($row['role_id'] == 1) {
            ?>
             <div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                 <div class="content-header">
                     <div class="container-fluid">
                         <div class="row mb-2">
                             <div class="col-sm-6">
                                 <h1 class="m-0 text-dark">Welcome <?php echo $name ?></h1>
                             </div><!-- /.col -->
                             <div class="col-sm-6">
                                 <ol class="breadcrumb float-sm-right">
                                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                                     <li class="breadcrumb-item active">Dashboard</li>
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
                             <div class="col-12 col-sm-6 col-md-3">
                                 <div class="info-box">
                                     <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-home"></i></span>

                                     <div class="info-box-content">
                                         <span class="info-box-text">Available Home</span>
                                         <span class="info-box-number">
                                             <?php echo $room ?>
                                         </span>
                                         <a href="">View Details</a>
                                     </div>
                                     <!-- /.info-box-content -->
                                 </div>
                                 <!-- /.info-box -->
                             </div>
                             <!-- /.col -->
                             <div class="col-12 col-sm-6 col-md-3">
                                 <div class="info-box mb-3">
                                     <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file"></i></span>

                                     <div class="info-box-content">
                                         <span class="info-box-text">Pending Request</span>
                                         <span class="info-box-number"><?php echo $request ?></span>
                                     </div>
                                     <!-- /.info-box-content -->
                                 </div>
                                 <!-- /.info-box -->
                             </div>
                             <!-- /.col -->

                             <!-- fix for small devices only -->
                             <div class="clearfix hidden-md-up"></div>

                             <div class="col-12 col-sm-6 col-md-3">
                                 <div class="info-box mb-3">
                                     <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                                     <div class="info-box-content">
                                         <span class="info-box-text">Approved Request</span>
                                         <span class="info-box-number"><?php echo $approve ?></span>
                                     </div>
                                     <!-- /.info-box-content -->
                                 </div>
                                 <!-- /.info-box -->
                             </div>
                             <!-- /.col -->
                             <div class="col-12 col-sm-6 col-md-3">
                                 <div class="info-box mb-3">
                                     <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-trash"></i></span>

                                     <div class="info-box-content">
                                         <span class="info-box-text">Ejected Request</span>
                                         <span class="info-box-number"><?php echo $reject ?></span>
                                     </div>
                                     <!-- /.info-box-content -->
                                 </div>
                                 <!-- /.info-box -->
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->


                         <div class="row">
                             <!-- Left col -->
                             <div class="col-md-12">

                                 <div class="card">
                                     <div class="card-header border-transparent">
                                         <h3 class="card-title">Recently Published</h3>

                                         <div class="card-tools">
                                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                 <i class="fas fa-minus"></i>
                                             </button>
                                             <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                 <i class="fas fa-times"></i>
                                             </button>
                                         </div>
                                     </div>
                                     <!-- /.card-header -->
                                     <div class="card-body p-0">
                                         <div class="table-responsive">
                                             <table class="table m-0">
                                                 <thead>
                                                     <tr>
                                                         <th>Sortcode</th>
                                                         <th>Topic</th>
                                                         <th>Status</th>
                                                         <th>Date Submitted</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <tr>
                                                         <td><a href="#">a</a></td>
                                                         <td>..</td>
                                                         <td>
                                                             <span class="badge badge-success">Published</span>
                                                         </td>
                                                         <td>
                                                             <div class="sparkbar" data-color="#00a65a" data-height="20">2020</div>
                                                         </td>
                                                     </tr>


                                                 </tbody>
                                             </table>
                                         </div>
                                         <!-- /.table-responsive -->
                                     </div>
                                     <!-- /.card-body -->
                                     <div class="card-footer clearfix">
                                         <a href="" class="btn btn-sm btn-info float-right">View All</a>
                                     </div>
                                     <!-- /.card-footer -->
                                 </div>
                                 <!-- /.card -->
                             </div>
                             <!-- /.col -->

                         </div>

                         <!-- /.row -->
                     </div>
                     <!--/. container-fluid -->
                 </section>
                 <!-- /.content -->
             </div>
         <?php } else { ?>
             <div class="content-wrapper">
                 <!-- Content Header (Page header) -->
                 <div class="content-header">
                     <div class="container-fluid">
                         <div class="row mb-2">
                             <div class="col-sm-6">
                                 <h1>Dashboard</h1>
                             </div><!-- /.col -->
                             <div class="col-sm-6">
                                 <ol class="breadcrumb float-sm-right">
                                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                                     <li class="breadcrumb-item active">Dashboard</li>
                                 </ol>
                             </div><!-- /.col -->
                         </div><!-- /.row -->
                     </div><!-- /.container-fluid -->
                 </div>
                 <!-- /.content-header -->
                 <section class="content">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="card card-outline card-info">
                                 <div class="card-header">
                                     <h1 class="text-center">
                                         Welcome : {{Auth::user()->name}} {{Auth::user()->othername}}
                                     </h1>
                                     <p class="text-center">Department of {{Auth::user()->department}}</p><br>
                                     <p class="text-center">Kindly make use of the sidebar navigations to accomplish your mission</p>
                                     <p class="text-center">Thank you.</p>
                                     <!-- tools box -->
                                     <div class="card-tools">


                                     </div>
                                     <!-- /. tools -->
                                 </div>
                                 <!-- /.card-header -->

                             </div>
                         </div>
                         <!-- /.col-->
                     </div>
                     <!-- ./row -->
                 </section>
             <?php } ?>

             <?php include 'includes/footer.php' ?>