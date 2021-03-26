<?php 
if ($_SESSION['status']!=1) { // 1 = admin | 2 = headmaster | 3 = students
    redirect_js('index');
} ?>

<h3>Foods</h3>
<div class="alert-container"></div>

<div id="content-data"></div>
