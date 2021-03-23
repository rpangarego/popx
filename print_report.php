<?php require 'inc/functions.php' ?>

<h3 align="center">Print Students Data Report</h3>
<br><br>

<form action="generate_report" method="POST">
<table style="margin: 0 auto;">
    <tr>
        <td>Student</td><td>:</td>
        <td>
            <select name="students" id="students">
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
<button type="submit" id="print-report" class="btn btn-secondary">Print</button>
</form>