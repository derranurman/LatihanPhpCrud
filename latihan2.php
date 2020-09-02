<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
</head>
<body>
    <h3>Daftar Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover table-dark">
   <tr>
   <th>#</th>
   <th>GAMBAR</th>
   <th>NPM</th>
   <th>NAMA</th>
   <th>EMAIL</th>
   <th>JURUSAN</th>
   <th>AKSI</th>
   </tr>
  
   <?php $i = 1;
    foreach($mahasiswa as $m) :?>
   <tr>
       <td><?= $i++; ?></td>
       <td><img src="img/<?= $m['GAMBAR']; ?>" width="100px" height="100px"></td>
       <td><?= $m['NPM']; ?></td>
       <td><?= $m['NAMA']; ?></td>
       <td><?= $m['EMAIL']; ?></td>
       <td><?= $m['JURUSAN']; ?></td>
       <td>
        <a href="">Ubah</a> | <a href="">Hapus</a>
       </td>
   </tr>
   <?php endforeach; ?>
    </table>
</body>
</html>