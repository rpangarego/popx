<?php 
    require_once '../functions.php';

    $where = [];

    if (isset($_POST["student"])) {
        if ($_POST["student"] != 'all') {
            $where_student .= "st.id=".$_POST["student"];
            array_push($where, $where_student);
        }
    }

    if (isset($_POST["gender"])) {
        if ($_POST["gender"] != 'all') {
            $where_gender .= "st.gender=".$_POST["gender"];
            array_push($where, $where_gender);
        }
    }

    if (isset($_POST["major"])) {
        if ($_POST["major"] != 'all') {
            $where_major .= "mj.id=".$_POST["major"];
            array_push($where, $where_major);
        }
    }

    if (count($where) > 0) {
        $where = " WHERE ". join(" AND ",$where);
    }else{
        $where = "";
    }

    $query = "SELECT st.*, mj.major, fd.menu, fd.category FROM students st LEFT JOIN majors mj ON mj.id=st.major_id LEFT JOIN foods fd ON fd.id=st.food_id $where ORDER BY created_at DESC";

    $students = $db->get_results($query);
?>

<div id="preview-data-report">
    <h2 align="center" class="mb-4">Preview Report</h2>

    <table class="table table-bordered table-resposive">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Full Name</th>
            <th scope="col">Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">City</th>
            <th scope="col">Major</th>
            <th scope="col">Fav Menu</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($students) < 1) : ?>
            <tr>
                <td colspan="8" style="text-align:center;">No data</td>
            </tr>
        <?php else : 
            foreach ($students as $student) {
            $birth  = $student->birth_place.', '. date("d M Y", strtotime($student->birth_date));
            $gender = ($student->gender == 1) ? 'Male' : 'Female'; 
        ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $student->full_name ?></td>
                <td><?= $birth ?></td>
                <td><?= $gender ?></td>
                <td><?= $student->city ?></td>
                <td><?= $student->major ?></td>
                <td><?= "[".$student->category."] ".$student->menu ?></td>
            </tr>
        <?php }
        endif; ?>
        </tbody>
    </table>
</div>