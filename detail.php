<?php
require 'functions.php';
//ambil id dari url
$id = $_GET['id'];
//query mahasiswa
$m = query("SELECT * FROM mahasiswa WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail MAhasiswa</title>
</head>
<body>
    <H3>Detail Mahasiswa</H3>
    <ul>
        <li><img src="img/<?= $m['GAMBAR']; ?>" width="100px" height="100px"></li>
        <li>NPM : <?= $m['NPM']; ?></li>
        <li>NAMA : <?= $m['NAMA']; ?></li>
        <li>EMAIL : <?= $m['EMAIL']; ?></li>
        <li>JURUSAN :<?= $m['JURUSAN']; ?></li>
        <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
        <li><a href="latihan3.php">Kembali ke daftar mahasiswa</a></li>
    </ul>
</body>
</html>