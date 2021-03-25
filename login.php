<?php require './inc/functions.php';
    if (isset($_SESSION['userid'])) redirect_js('index');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PopX</title>
</head>
<body>

    <div class="alert-container"></div>

    <form method="POST" id="login-form">
    <table>
        <tr><td colspan="2">Login Page!</td></tr>
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" id="username" name="username" required
        input autocomplete="off"></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" id="password" name="password" required
        input></td>
        </tr>
        <tr>
            <td><button type="submit" id="btn-login">Login</button></td>
        </tr>
    </table>
    </form>

    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>