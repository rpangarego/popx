<?php
    include "../../inc/functions.php";

    // form_status (tambah/edit) -> get from script.js
    if ($_GET['form_status'] == 'foods_edit') {
        $id=$_GET['id'];
        $result=$db->get_row("SELECT * FROM foods WHERE id='$id'");
    }
    
    $id = (!empty($result->id)) ? $result->id : '';
    $menu = (!empty($result->menu)) ? $result->menu : '';
    $category = (!empty($result->category)) ? $result->category : '';
    $price = (!empty($result->price)) ? $result->price : '';

    $form_title = ($_GET['form_status'] == 'foods_edit') ? 'EDIT FOOD' : 'ADD FOOD';
?>
<h3 class="text-center"><?= $form_title ?></h3>

<div class="row">
    <div class="col-md-6 mx-auto">
        <form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />

            <div class="form-group">
                <label for="menu">Menu</label>
                <input type="text" name="menu" id="menu" class="form-control" required value="<?= $menu; ?>" autocomplete="off"/>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" required class="custom-select">
                    <option value="Food" <?= ($category=='Food') ? 'selected' : '' ?> >Food</option>
                    <option value="Drink" <?= ($category=='Drink') ? 'selected' : '' ?> >Drink</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                    </div>
                    <input type="text" name="price" id="price" class="form-control" required value="<?= $price; ?>" autocomplete="off"/>
                </div>
            </div>

            <div class="form-buttons d-flex justify-content-end">
                <button type="button" id="cancel-button" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>