<?php require './inc/functions.php';
    if (!isset($_SESSION['userid'])) redirect_js('login');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Popcorn - Ajax</title>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>

    <body>
        <div align="center">
            <h2>PopX v.0.1 (Alpha)</h2>
            <div class="links">
                <a href="index">Home</a>
                <a href="index?m=posts">Posts</a>
                <a href="index?m=foods">Foods</a>
                <a href="index?m=students">Students</a>
                <a href="index?m=majors">Majors</a>
                <a href="index?m=about">About</a>
                <a href="actions?action=logout">Logout</a>
            </div>

            <div id="content">
                <?php
                    $module = (isset($_GET['m'])) ? $_GET['m'] : false ;

                    if($module){
                        $module_file = "module/$module/index.php";

                        if (file_exists($module_file)) {
                            include $module_file;
                        }else{
                            include "page404.php";
                        }

                    } else {
                        include "homepage.php";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
