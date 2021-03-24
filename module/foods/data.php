<div class="buttons mb-4 d-flex justify-content-end">
    <button id="add-button" class="btn btn-primary  mr-3">New Data</button>
</div>

<table border="1" cellspacing="0" cellpadding="0" id="data-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Menu</th>
            <th>Category</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

   require "../../inc/functions.php";
   $no=1;
   $foods = $db->get_results("SELECT * FROM foods ORDER BY category");

    if ($foods) :
       foreach ($foods as $food) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $food->menu; ?></td>
            <td><?= $food->category; ?></td>
            <td><?= 'Rp. '.$food->price; ?></td>
            <td>
                <button id="edit-button" class="btn btn-sm btn-warning" data-id="<?= $food->id; ?>">Edit</button>
                <button id="delete-button" class="btn btn-sm btn-danger" data-id="<?= $food->id; ?>" data-action="foods_hapus">Delete</button>
            </td>
        </tr>

    <?php endforeach;
    else: ?>
        <tr>
            <td colspan="6" style="text-align:center;">Tidak ada data</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>

<script>
    $('#data-table').DataTable();
</script>