<!-- Sidebar Nav -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Nav items -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link active" href="index">
        <i class="ni ni-tv-2"></i>
        <span class="nav-link-text">Home</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index?m=posts">
        <i class="ni ni-planet"></i>
        <span class="nav-link-text">Posts</span>
        </a>
    </li>

    <?php if ($_SESSION['status'] == 1) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
    <li class="nav-item">
        <a class="nav-link" href="index?m=foods">
        <i class="ni ni-pin-3"></i>
        <span class="nav-link-text">Foods</span>
        </a>
    </li>
    <?php } ?>
    
    <li class="nav-item">
        <a class="nav-link" href="index?m=students">
        <i class="ni ni-single-02"></i>
        <span class="nav-link-text">Students</span>
        </a>
    </li>

    <?php if ($_SESSION['status']==1 || $_SESSION['status']==2 ) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
    <li class="nav-item">
        <a class="nav-link" href="index?m=majors">
        <i class="ni ni-key-25"></i>
        <span class="nav-link-text">Majors</span>
        </a>
    </li>
    <?php } ?>

    <?php if ($_SESSION['status'] == 1) { ?> <!-- 1 = admin | 2 = headmaster | 3 = students -->
    <li class="nav-item">
        <a class="nav-link" href="index?m=about">
        <i class="ni ni-air-baloon"></i>
        <span class="nav-link-text">About</span>
        </a>
    </li>
    <?php } ?>
    </ul>
    <!-- Divider -->
    <hr class="my-3">
    <div class="copyright text-center  text-sm-left  text-muted">
        <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> X 
        <a href="https://rpangarego.netlify.app" class="font-weight-bold" target="_blank">Popcorn</a>
    </div>
</div>