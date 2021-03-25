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
    echo "<h3>$form_title</h3>";
?>

<form method="POST" id="form" data-form-status='<?= $_GET['form_status'] ?>'>
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
    <table>
        <tr>
            <td>Menu</td>
            <td>
                <input type="hidden" name="id" id="id" required value="<?= $id; ?>" />
                <input type="text" name="menu" id="menu" required value="<?= $menu; ?>" />
            </td>
        </tr> 
        <tr>
            <td>Category</td> 
            <td>
                <select name="category" id="category" required>
                    <option value="Food" <?= ($category=='Food') ? 'selected' : '' ?> >Food</option>
                    <option value="Drink" <?= ($category=='Drink') ? 'selected' : '' ?> >Drink</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Price (Rp)</td>
            <td>
                <input type="text" name="price" id="price" required value="<?= $price; ?>" />
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
