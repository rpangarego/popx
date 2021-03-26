<?php
    include "../../inc/functions.php";

    // form_status (tambah/edit) -> get from script.js
    if ($_GET['form_status'] == 'majors_edit') {
        $id=$_GET['id'];
        $result=$db->get_row("SELECT * FROM majors WHERE id='$id'");
    }
    
    $id = (!empty($result->id)) ? $result->id : '';
    $major_code = (!empty($result->major_code)) ? $result->major_code : '';
    $major = (!empty($result->major)) ? $result->major : '';

    $form_title = ($_GET['form_status'] == 'majors_edit') ? 'EDIT MAJOR DATA' : 'ADD MAJOR DATA';
    echo "<h3 class='text-center'>$form_title</h3>";
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />

            <div class="form-group">
                <label for="id">Major Code</label>
                <input type="text" name="major_code" id="major_code" class="form-control" required maxlength='5' value="<?= $major_code; ?>" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="major">Major</label>
                <input type="text" name="major" id="major" class="form-control" required value="<?= $major; ?>" autocomplete="off"/>
            </div>
            
            <div class="form-buttons d-flex justify-content-end">
                <button type="button" id="cancel-button" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>