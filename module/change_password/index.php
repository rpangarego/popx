<h1>Change Password</h1>
<div class="alert-container"></div>

<div id="content-data">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" id="change-password-form">
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <div class="form-group">
                <label for="password_old">Old Password</label>
                <input type="password" class="form-control" id="password_old" name="password_old">
            </div>
            <div class="form-group">
                <label for="password_new">New Password</label>
                <input type="password" class="form-control" id="password_new" name="password_new">
            </div>
            <div class="form-group">
                <label for="password_conf">Repeat Password</label>
                <input type="password" class="form-control" id="password_conf" name="password_conf">
            </div>

            <button type="submit" id="update-pass-btn" class="btn btn-primary disabled" disabled>Update Password</button>
            </form>
        </div>
    </div>
    
</div>
