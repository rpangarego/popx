<?php require './inc/functions.php';
    if (!isset($_SESSION['userid'])) redirect_js('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PopX v.1_Alpha</title>
        <!-- Icons -->
        <link rel="stylesheet" href="assets/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="assets/css/all.min.css" type="text/css">
        <!-- Page plugins -->
        <!-- Argon CSS -->
        <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
        <!-- dataTables and JQuery -->
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </head>

    <body>
     <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
            <h1 class="text-primary font-weight-bold">PopX v.1</h1>
            </a>
        </div>
        <div class="navbar-inner">
            <?php include 'inc/partials/sidebar.php'; ?>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
                </li>
                <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                    <i class="ni ni-zoom-split-in"></i>
                </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="images/team-4.jpg">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                        <span class="mb-0 text-sm font-weight-bold"><?= ucwords($_SESSION['username'])?></span>
                    </div>
                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right ">
                    <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Menu</h6>
                    </div>
                    <a href="index?m=profile" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                    </a>
                    <a href="index?m=change_password" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="actions?action=logout" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                    </a>
                </div>
                </li>
            </ul>
            </div>
        </div>
        </nav>
       <?php
            if (!isset($_GET['m'])) {
                include 'inc/partials/header.php'; 
            }
        ?>

        <!-- Page content -->
        <div class="container-fluid pt-3" id="content">
            <div class="card">
                <div class="card-body">
                    <?php
                        $module = (isset($_GET['m'])) ? $_GET['m'] : false ;

                        if($module){
                            $module_file = "module/$module/index.php";
                            if (file_exists($module_file)) {
                                include $module_file;
                            }else{
                                include "inc/partials/page404.php";
                            }
                        } else {
                            include "homepage.php";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

        <!-- Scripts -->
        <!-- Core -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/js.cookie.js"></script>
        <script src="assets/js/jquery.scrollbar.min.js"></script>
        <script src="assets/js/jquery-scrollLock.min.js"></script>
        <!-- Argon JS -->
        <script src="assets/js/argon.js?v=1.2.0"></script>
    </body>
</html>
