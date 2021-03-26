<?php require '../functions.php' ?>

<h3 align="center">Print Students Data Report</h3>
<br><br>

<form action="generate_report" method="POST">
<table style="margin: 0 auto;">
    <tr>
        <td>Student</td><td>:</td>
        <td>
            <select name="student" id="student">
                <option value="all">All</option>
                <?= getStudentOptions() ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Gender</td><td>:</td>
        <td>
            <select name="gender" id="gender">
                <option value="all">All</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Major</td><td>:</td> 
        <td>
            <select name="major" id="major">
                <option value="all">All</option>
                <?= getMajorOptions() ?>
            </select>
        </td>
    </tr>
</table>
<br>

    <div style="display:flex; justify-content:center; margin: 0 auto;">
        <button class="btn btn-secondary" onclick="window.close()">Close</button>
        <button type="button" id="preview-report">Preview</button>
        <button type="submit" id="print-report">Print</button>
    </div>
</form>

<br>
<hr>
<div id="preview-data"></div>

<script src="../../assets/js/jquery-3.6.0.js"></script>
<script src="../../assets/js/script.js"></script>
