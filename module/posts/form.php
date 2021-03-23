<?php
    include "../../inc/functions.php";

    // form_status (tambah/edit) -> get from script.js
    if ($_GET['form_status'] == 'posts_edit') {
        $id=$_GET['id'];
        $result=$db->get_row("SELECT * FROM posts WHERE id='$id'");
    }
    
    $id = (!empty($result->id)) ? $result->id : '';
    $title = (!empty($result->title)) ? $result->title : '';
    $description = (!empty($result->description)) ? $result->description : '';
    $writer = (!empty($result->writer)) ? $result->writer : '';
?>

<form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
    <table>
        <tr>
            <td>Title</td>
            <td>
                <input type="hidden" name="id" id="id" required="" value="<?= $id; ?>" />
                <input type="text" name="title" id="title" required="" value="<?= $title; ?>" />
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" id="description" required=""><?= $description; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Writer</td>
            <td>
                <select name="writer" id="writer" required="">
                    <option value="Popcorn" <?= ($writer=='Popcorn') ? 'selected' : '' ?> >Popcorn</option>
                    <option value="Ramen" <?= ($writer=='Ramen') ? 'selected' : '' ?> >Ramen</option>
                    <option value="Sushi" <?= ($writer=='Sushi') ? 'selected' : '' ?> >Sushi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" id="simpan" value="Simpan" />
                <button type="button" id="cancel-button">Batal</button>
            </td>
        </tr>
    </table>
</form>
