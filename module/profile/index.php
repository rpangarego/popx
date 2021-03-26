<?php 
   $user = $db->get_row("SELECT * FROM users WHERE id='$_SESSION[userid]'");
   
   if ($user->status == 1) {
       $user_status = 'Admin';
   } elseif ($user->status = 2) {
        $user_status = 'Headmaster';
   } elseif ($user->status = 3) {
        $user_status = 'Student';
   } else {
        $user_status = 'Unknown';
   }
?>

<h1>My Profile</h1>
<div class="alert-container"></div>

<div id="content-data">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" id="update-profile-form">
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input type="hidden" id="userid" name="userid" value="<?= $user->id ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                    <input type="text" class="form-control" id="username" value="<?= $user_status ?>" readonly>
            </div>

            <button type="submit" id="update-profile-btn" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    
</div>
