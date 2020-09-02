<?php
require 'functions.php';
//cek apakah tombol sudah di tekan
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('data berhasil ditambahkkan');
        document.location.href = 'latihan3.php';
        </script>";
 }else{
     echo "data gagal di tambahkan!!!";
 }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mahasiswa</title>
</head>
<body>
    <h3>Tambah Data Mahasiswa</h3>
    <form action="" method="POST">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="NAMA" autofocus required>
                </label>
            </li>
            <li>
                <label>
                    NPM :
                    <input type="text" name="NPM" required>
                </label>
            </li>
            <li>
                <label>
                    E-MAIL :
                    <input type="text" name="EMAIL" required>
                </label>
            </li>
            <li>
                <label>
                    JURUSAN :
                    <input type="text" name="JURUSAN" required>
                </label>
            </li>
            <li>
                <label>
                    GAMBAR :
                    <input type="text" name="GAMBAR">
                </label>
            </li>
            <li>
                <button type="submit" name="tambah">TAMBAH DATA</button>
            </li>
        </ul>
    </form>
    
</body>
</html>