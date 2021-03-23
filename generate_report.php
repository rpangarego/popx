<?php 
	ob_start();
	require_once 'inc/functions.php';
	require_once 'vendor/autoload.php';

    $where = [];

    if (isset($_POST["students"])) {
        if ($_POST["students"] != 'all') {
            $where_student .= "st.id=".$_POST["students"];
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
	$html = '<h2 style="text-align:center;">Students Data Report</h2><br>';

    $html .= '<p style="text-align:center;">Printed @: '.date('d M Y H:i:s').'</p><table class="table" border="1" cellpadding="6" cellspacing="0" style="margin: 0 auto;"><thead>
        <tr>
            <th class="border-top-0">No</th>
            <th class="border-top-0">Full Name</th>
            <th class="border-top-0">Birth</th>
            <th class="border-top-0">Gender</th>
            <th class="border-top-0">City</th>
            <th class="border-top-0">Major</th>
            <th class="border-top-0">Fav Menu</th>
        </tr>
    </thead><tbody>';

$html .= $query;
    if (count($students) < 1) {
        $html .= '<tr><td colspan="8" style="text-align:center;">No data</td></tr>';
    }else{
        foreach ($students as $student) {
            $birth  = $student->birth_place.', '. date("d M Y", strtotime($student->birth_date));
            $gender = ($student->gender == 1) ? 'Male' : 'Female';
            $html .= '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$student->full_name.'</td>
                        <td>'.$birth.'</td>
                        <td>'.$gender.'</td>
                        <td>'.$student->city.'</td>
                        <td>'.$student->major.'</td>
                        <td>['.$student->category.'] '.$student->menu.'</td>
                    </tr>';
        }
    }

    $html .= '</tbody>
    </table>';


	// Create Raport PDF File
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
	$mpdf->WriteHTML($html);
	$filename = 'Students Report.pdf';
	$mpdf->Output($filename,\Mpdf\Output\Destination::INLINE);
	ob_end_flush();
	ob_clean();
 ?>