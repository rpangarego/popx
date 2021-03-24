<?php
    include "../../inc/functions.php";

    // form_status (tambah/edit) -> get from script.js
    if ($_GET['form_status'] == 'students_edit') {
        $id=$_GET['id'];
        $result=$db->get_row("SELECT * FROM students WHERE id='$id'");
    }
    
    $id = (!empty($result->id)) ? $result->id : '';
    $full_name = (!empty($result->full_name)) ? $result->full_name : '';
    $birth_date = (!empty($result->birth_date)) ? date("Y-m-d", strtotime($result->birth_date)) : '';
    $birth_place = (!empty($result->birth_place)) ? $result->birth_place : '';

    $gender = (!empty($result->gender)) ? $result->gender : '';
    $city = (!empty($result->city)) ? $result->city : '';
    $major_id = (!empty($result->major_id)) ? $result->major_id : '';
    $food_id = (!empty($result->food_id)) ? $result->food_id : '';
    $image_url = (!empty($result->image_url)) ? $result->image_url : '';
?>

<form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>' data-module='<?= $_GET['module'] ?>' data-form-action='<?= $_GET['form_action'] ?>'>
    <table>
        <tr>
            <td>Full Name</td>
            <td>
                <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />
                <input type="text" name="full_name" id="full_name" required value="<?= $full_name; ?>" autocomplete="off"/>
            </td>
        </tr>
        <tr>
            <td>Birth Place</td>
            <td>
                <input type="text" name="birth_place" id="birth_place" required value="<?= $birth_place; ?>" autocomplete="off" />
            </td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td>
                <input type="date" name="birth_date" id="birth_date" required value="<?= $birth_date; ?>" />
            </td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <select name="gender" id="gender" required>
                    <option value="1" <?= ($gender=='1') ? 'selected' : '' ?> >Male</option>
                    <option value="2" <?= ($gender=='2') ? 'selected' : '' ?> >Female</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" name="city" id="city" required value="<?= $city; ?>" autocomplete="off" />
            </td>
        </tr>
        <tr>
            <td>Major</td>
            <td>
                <select name="major_id" id="major_id">
                    <?= getMajorOptions($major_id) ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Food</td>
            <td>
                <select name="food_id" id="food_id">
                    <?= getFoodOptions($food_id) ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="fileimage" id="fileimage" accept="image/*" >
            <input type="hidden" name="tmp_image_url" id="tmp_image_url" value="<?= $image_url; ?>" ></td>
            
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
