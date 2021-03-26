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

    $form_title = ($_GET['form_status'] == 'students_edit') ? 'EDIT STUDENT DATA' : 'ADD STUDENT DATA';
?>
<h3 class="text-center"><?= $form_title ?></h3>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" id="form" class="was-validated" data-form-status='<?= $_GET['form_status'] ?>' data-module='<?= $_GET['module'] ?>' data-form-action='<?= $_GET['form_action'] ?>'>
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />
            
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" required class="form-control" value="<?= $full_name; ?>" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="birth_place">Birth Place</label>
                <input type="text" name="birth_place" id="birth_place" required class="form-control" value="<?= $birth_place; ?>" autocomplete="off" />
            </div>

            <div class="form-group">
                <label for="birth_data">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" required class="form-control" value="<?= $birth_date; ?>" />
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required class="custom-select">
                    <option value="1" <?= ($gender=='1') ? 'selected' : '' ?> >Male</option>
                    <option value="2" <?= ($gender=='2') ? 'selected' : '' ?> >Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" required class="form-control" value="<?= $city; ?>" autocomplete="off" />
            </div>

            <div class="form-group">
                <label for="major_id">Major</label>
                <select name="major_id" id="major_id" class="custom-select">
                    <?= getMajorOptions($major_id) ?>
                </select>
            </div>

            <div class="form-group">
                <label for="food_id">Fav Food</label>
                <select name="food_id" id="food_id" class="custom-select">
                    <?= getFoodOptions($food_id) ?>
                </select>
            </div>

            <div class="form-group">
                <label for="fileimage">Photo</label>
                <div class="card shadow-none border">
                    <div class="card-body">
                    <input type="file" name="fileimage" id="fileimage" accept="image/*" >
                    <input type="hidden" name="tmp_image_url" id="tmp_image_url" value="<?= $image_url; ?>" >
                    </div>
                </div>
                
            </div>

            <div class="form-buttons d-flex justify-content-end">
                <button type="button" id="cancel-button" class="btn btn-secondary" >Cancel</button>
                <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>