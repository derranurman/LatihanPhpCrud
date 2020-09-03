<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}
require 'functions.php';
// ketika tombool login di tekan
if (isset($_POST['login'])) {
    $login = login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <h3>FORM LOGIN</h3>
    <?php if(isset($login['error'])) : ?>
    <p style="color: red;"><?= $login['pesan']; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Username
                    <input type="text" name="username" autofocus required>
                </label>
            </li>

            <li>
                <label>
                    Password
                    <input type="password" name="password" required>
                </label>
            </li>
            <li>
                    <button type="submit" name="login">Login</button>
            </li>
            <li>
                <a href="registrasi.php">Tambah USER!!!</a>
            </li>
        </ul>
    </form>
</body>
</html>