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

    $form_title = ($_GET['form_status'] == 'posts_edit') ? 'EDIT POST' : 'ADD POST';
    echo "<h3 class='text-center'>$form_title</h3>";
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="hidden" name="id" id="id" class="form-control" required value="<?= $id; ?>" />
                        <input type="text" name="title" id="title" class="form-control" required value="<?= $title; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required><?= $description; ?></textarea>
                    </div>
                
                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <select name="writer" id="writer" class="custom-select" required>
                            <option value="Popcorn" <?= ($writer=='Popcorn') ? 'selected' : '' ?> >Popcorn</option>
                            <option value="Ramen" <?= ($writer=='Ramen') ? 'selected' : '' ?> >Ramen</option>
                            <option value="Sushi" <?= ($writer=='Sushi') ? 'selected' : '' ?> >Sushi</option>
                        </select>
                    </div>
                   
                    <div class="form-buttons d-flex justify-content-end">
                        <button type="button" id="cancel-button" class="btn btn-secondary" >Cancel</button>
                        <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Save</button>
                    </div>
            </table>
        </form>
    </div>
</div>

