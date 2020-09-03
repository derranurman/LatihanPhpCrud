<?php
require 'functions.php';
if(isset($_POST['registrasi'])) {
    registrasi($_POST);
    echo "<script>
        alert('user berhasil ditambahkan !!!');
        document.location.href = 'login.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h3>form Registrasi</h3>
    <form action="" method="POST">
    <ul>
    <li>
       <label>
                Username :
               <input type="text" name="username" autofocus required autocomplete="off">
               </label>
            </li>

            <li>
       <label>
                Password :
               <input type="password" name="password1" required>
               </label>
            </li>

            <li>
       <label>
                 Kofirmasi Password :
               <input type="password" name="password2" required>
               </label>
            </li>
            <li><button type="submit" name="registrasi">Registrasi</button></li>
    </ul>

    </form>
</body>
</html>