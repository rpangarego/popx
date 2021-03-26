<?php require './inc/functions.php';
    if (!isset($_SESSION['userid'])) redirect_js('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Popcorn - Ajax</title>
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </head>

    <body>
        <div align="center">
            <h2>PopX v.0.1 (Alpha)</h2>
            <div class="links">
                <a href="index">Home</a>
                <a href="index?m=posts">Posts</a>

                <?php if ($_SESSION['status']==1) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
                    <a href="index?m=foods">Foods</a>
                <?php } ?>
                
                <a href="index?m=students">Students</a>

                <?php if ($_SESSION['status']==1 || $_SESSION['status']==2 ) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
                    <a href="index?m=majors">Majors</a>
                <?php } ?>

                <?php if ($_SESSION['status']==1) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
                    <a href="index?m=about">About</a>
                <?php } ?>
                
                <a href="actions?action=logout">Logout (<?= ucwords($_SESSION['username']) ?>)</a>
            </div>

            <div id="content">
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
                        include "inc/partials/homepage.php";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
