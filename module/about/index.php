<?php 
if ($_SESSION['status']!=1) { // 1 = admin | 2 = headmaster | 3 = students
    redirect_js('index');
} ?>

<h3>About PopX</h3>
<div class="alert-container"></div>

<div id="content-data">
    <p><b>PopX</b> is a simple "framework" (maybe) build with PHP and Ajax Jquery. 
    <br> Created by <b>Popcorn</b> (Ronaldo Pangarego)</p>
</div>
