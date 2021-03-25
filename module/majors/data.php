<div class="buttons mb-4 d-flex justify-content-end">
    <button id="add-button" class="btn btn-primary mr-3">New Data</button>
</div>

<table border="1" cellspacing="0" cellpadding="0" id="data-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Code</th>
            <th>Majors</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

   require "../../inc/functions.php";
   $no=1;
   $majors = $db->get_results("SELECT * FROM majors");

    if ($majors) :
       foreach ($majors as $major) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $major->major_code; ?></td>
            <td><?= $major->major; ?></td>
            <td>
                <button id="edit-button" class="btn btn-sm btn-warning" data-id="<?= $major->id; ?>">Edit</button>
                <button id="delete-button" class="btn btn-sm btn-danger" data-id="<?= $major->id; ?>" data-action="majors_hapus" data-token="<?= $_SESSION['token'] ?>">Delete</button>
            </td>
        </tr>
    <?php endforeach;
    else: ?>
        <tr>
            <td colspan="4" style="text-align:center;">No data</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>

<script>
    $('#data-table').DataTable();
</script>