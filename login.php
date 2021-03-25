<?php require './inc/functions.php';
    if (isset($_SESSION['userid'])) redirect_js('index');
?>

<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PopX - Login</title>
  <!-- Icons -->
  <link rel="stylesheet" href="assets/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-gradient-primary">
  <!-- Main content -->
  <div class="main-content">
    <h1 class="text-center text-white my-5">Login Page!</h1>
    <!-- Page content -->
    <div class="container  mt-3 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-4">
              <div class="text-center text-muted mb-4">
                <h3>Sign in with credentials</h3>
              </div>

              <div class="alert-container"></div>

              <form id="login-form" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" id="btn-login" class="btn btn-primary my-2">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>