<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="../polylogo.jpg" alt="TPI" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">OLORI HALL</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!--div class="image">
                <img src="" class="brand-image img-circle elevation-3" alt="User Image">
                </div-->
                <div class="info">
                <a href="#" class="d-block"><i class="fa fa-circle text-success"></i> <?php echo $name?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                        </a>
                    </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <?php 
                            if (in_array(1, $user)) {
                        ?>
                    <li class="nav-item">
                        <a href="request.php" class="nav-link">
                        <i class="fas fa-file nav-icon"></i>
                        <p>New Request <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $request?></sup></p>
                        </a>
                    </li>
                    <?php }?>
                        <?php 
                            if (in_array(1, $user) || in_array(13, $user)) {
                        ?>
                    <li class="nav-item">
                        <a href="allocated.php" class="nav-link">
                        <i class="fas fa-check nav-icon"></i>
                        <p>Approved <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $approve?></sup></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="initiate.php" class="nav-link">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Initiate Registration</p>
                        </a>
                    </li>
                    <?php }?>
                    <?php 
                            if (in_array(1, $user) || in_array(13, $user)) {
                        ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            All Blocks
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="blockA.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block A <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $a?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockB.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block B <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $b?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockC.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block C <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $c?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockD.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block D <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $d?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockE.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block E <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $e?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockF.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block F <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $f?></sup></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blockG.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Block G <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo $g?></sup></p>
                            </a>
                        </li>
                        
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Others
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="users.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User <sup class="text-red" style="font-size: 16px; margin-left:10px"><?php echo in_array(1, $user) ?$total_user : $total_user2?></sup></p>
                            </a>
                        </li>
                        
                        </ul>
                    </li>
                    <?php }?>
                    <li class="nav-item">
                        <a href="change-password.php" class="nav-link">
                        <i class="fas fa-lock-open nav-icon"></i>
                        <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                        <i class="fas fa-power-off nav-icon"></i>
                        <p>Logout</p>
                        </a>
                    </li>

                    </ul>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>