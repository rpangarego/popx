<div class="buttons mb-4 d-flex justify-content-end">
    <button id="add-button" class="btn btn-primary mr-3">New Data</button>
</div>

<table border="1" cellspacing="0" cellpadding="5px" id="data-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Writer</th>
            <th>Timestamp</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

   require "../../inc/functions.php";
   $no=1;
   $posts = $db->get_results("SELECT * FROM posts ORDER BY title");

    if ($posts) :
       foreach ($posts as $post) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $post->title; ?></td>
            <td><?= $post->description; ?></td>
            <td><?= $post->writer; ?></td>
            <td><?= $post->created_at; ?></td>
            <td width='120'>
                <button id="edit-button" class="btn btn-sm btn-warning" data-id="<?= $post->id; ?>">Edit</button>
                <button id="delete-button" class="btn btn-sm btn-danger" data-id="<?= $post->id; ?>" data-action="posts_hapus" data-token="<?= $_SESSION['token'] ?>">Delete</button>
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