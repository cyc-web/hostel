 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3" method="GET" action="filter.php">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="date" name="start_date" placeholder="Search" aria-label="Search" required>
                <input class="form-control form-control-navbar" type="date" name="end_date" placeholder="Search" aria-label="Search" required>
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>
            <form class="form-inline ml-3" method="GET" action="track.php">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="text" placeholder="track transcript" name="appno" aria-label="Search" required>
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>
            <form class="form-inline ml-3" method="GET" action="previous.php">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="text" placeholder="Search previous record" name="appno" aria-label="Search" required>
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-plus"></i>
                <span class="badge navbar-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               
                <a href="../logout.php" class="dropdown-item dropdown-footer">Logout</a>
                </div>
            </li>
           
          
            </ul>
        </nav>