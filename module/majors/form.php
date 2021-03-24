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
    echo "<h3>$form_title</h3>";
?>

<form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
    <table>
        <tr>
            <td>Major Code</td>
            <td>
                <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />
                <input type="text" name="major_code" id="major_code" required maxlength='5' value="<?= $major_code; ?>" autocomplete="off"/>
            </td>
        </tr> 
        <tr>
            <td>Major</td> 
            <td>
                <input type="text" name="major" id="major" required value="<?= $major; ?>" autocomplete="off"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Save</button>
                <button type="button" id="cancel-button" class="btn btn-secondary" >Cancel</button>
            </td>
        </tr>
    </table>
</form>
