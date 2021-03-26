<?php require '../functions.php';
    if (!isset($_SESSION['userid'])) redirect_js('login');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>

  <link rel="stylesheet" href="../../assets/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../../assets/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

    <div class="row mt-5 mx-2">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 align="center">Print Students Data Report</h1>
                </div>
                <div class="card-body">
                
                <form action="generate_report" method="POST">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="student">Student</label>
                            <select name="student" id="student" class="custom-select">
                                <option value="all">All</option>
                                <?= getStudentOptions() ?>
                            </select>
                        </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="custom-select">
                                <option value="all">All</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="major">Major</label>
                            <select name="major" id="major" class="custom-select">
                                <option value="all">All</option>
                                <?= getMajorOptions() ?>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-secondary" onclick="window.close()">Close</button>
                        <button type="button" id="preview-report" class="btn btn-secondary">Preview</button>
                        <button type="submit" id="print-report" class="btn btn-primary">Print</button>
                        </div>
                    </div>
                </form>
                    
                <hr>
                <div id="preview-data"></div>

                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <script src="../../assets/js/script.js"></script>
</body>
</html>