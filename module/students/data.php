<div class="buttons mb-4 d-flex justify-content-end">
    <button id="add-button" class="btn btn-primary  mr-3">New Data</button>
    <button id="print-report" class="btn btn-secondary" onclick="window.open('print_report');">Print</button>
</div>

<table border="1" cellspacing="0" cellpadding="5px" id="data-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Full Name</th>
            <th>Birth</th>
            <th>Gender</th>
            <th>City</th>
            <th>Major</th>
            <th>Fav Menu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

   require "../../inc/functions.php";
   $no=1;
   $students = $db->get_results("SELECT st.*, mj.major, fd.menu, fd.category FROM students st LEFT JOIN majors mj ON mj.id=st.major_id LEFT JOIN foods fd ON fd.id=st.food_id ORDER BY created_at DESC");

    if ($students) :
       foreach ($students as $student) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $student->full_name; ?></td>
            <td><?= $student->birth_place.', '. date("d M Y", strtotime($student->birth_date)); ?></td>
            <td><?= ($student->gender == 1) ? 'Male' : 'Female'; ?></td>
            <td><?= $student->city; ?></td>
            <td><?= $student->major; ?></td>
            <td><?= "[$student->category] $student->menu"; ?></td>
            <td>
                <button id="edit-button" class="btn btn-sm btn-warning" data-id="<?= $student->id; ?>">Edit</button>
                <button id="delete-button" class="btn btn-sm btn-danger" data-id="<?= $student->id; ?>" data-action="students_hapus">Delete</button>
            </td>
        </tr>

    <?php endforeach;
    else: ?>
        <tr>
            <td colspan="8" style="text-align:center;">No data</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>

<script>
    $('#data-table').DataTable();
</script>