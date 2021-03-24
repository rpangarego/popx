  <!-- Header -->
  <div class="header bg-primary d-flex align-items-center pt-3">

<?php
    require 'inc/functions.php';
    $posts_total = $db->count_results("SELECT id FROM posts");
    $students_total = $db->count_results("SELECT id FROM students");
    $foods_total = $db->count_results("SELECT id FROM foods");
    $majors_total = $db->count_results("SELECT id FROM majors");
?>

<div class="container-fluid">
    <div class="header-body">
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total posts</h5>
                <span class="h2 font-weight-bold mb-0"><?=$posts_total?></span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total foods</h5>
                <span class="h2 font-weight-bold mb-0"><?=$foods_total?></span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                <span class="h2 font-weight-bold mb-0"><?=$students_total?></span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Majors</h5>
                <span class="h2 font-weight-bold mb-0"><?=$majors_total?></span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>