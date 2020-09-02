<?php
require 'functions.php';

//jika tidak ada id di url 
if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
}
//ambil id url
$id = $_GET['id'];
//query mahasiswa
$m = query("SELECT * FROM mahasiswa WHERE id = $id");

//cek apakah tombol sudah di tekan
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil di ubah');
        document.location.href = 'index.php';
        </script>";
 }else{
     echo "data gagal di ubah!!";
 }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ubah Data Mahasiswa</title>
</head>
<body>
    <h3>Ubah Data Mahasiswa</h3>
    <form action="" method="POST">
    <input type="hidden" name="id" autofocus required value="<?= $m['id']; ?>">
        <ul>
            <li>
                <label>
                    Nama :
                    <input type="text" name="NAMA" autofocus required value="<?= $m['NAMA']; ?>">
                </label>
            </li>
            <li>
                <label>
                    NPM :
                    <input type="text" name="NPM" required value="<?= $m['NPM']; ?>">
                </label>
            </li>
            <li>
                <label>
                    E-MAIL :
                    <input type="text" name="EMAIL" required value="<?= $m['EMAIL']; ?>">
                </label>
            </li>
            <li>
                <label>
                    JURUSAN :
                    <input type="text" name="JURUSAN" required value="<?= $m['JURUSAN']; ?>">  
                </label>
            </li>
            <li>
                <label>
                    GAMBAR :
                    <input type="text" name="GAMBAR" value="<?= $m['GAMBAR']; ?>">
                </label>
            </li>
            <li>
                <button type="submit" name="ubah">Ubah DATA</button>
            </li>
        </ul>
    </form>
    
</body>
</html>