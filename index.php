<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari di klik
if(isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mahasiswa</title>
</head>
<body>
    <a href="logout.php">Logout!!!</a>
    <h3>Daftar Mahasiswa</h3>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>
    <form action="" method="POST">
       <input type="text" name="keyword" size="40" placeholder="masukan pencarian !!!" autocomplete="off" autofocus class="keyword">
       <button type="submit" name="cari" class="tombol-cari">cari!!</button> 
    </form>
    <br>

    <div class="container">
    <table border="1" cellpadding="10" cellspacing="0" class="table table-hover table-dark">
   <tr>
   <th>#</th>
   <th>GAMBAR</th>
   <th>NAMA</th>
   <th>AKSI</th>
   </tr>
<?php if (empty($mahasiswa)) : ?>
   <tr>
       <td colspan="4">
           <p style="color: red; font-style:italic">data mahasiswa tidak ditemukan</p>
       </td>
   </tr>
<?php endif; ?>

   <?php $i = 1;
    foreach($mahasiswa as $m) :?>
   <tr>
       <td><?= $i++; ?></td>
       <td><img src="img/<?= $m['GAMBAR']; ?>" width="100px" height="100px"></td>
       <td><?= $m['NAMA']; ?></td>
       <td>
        <a href="detail.php?id=<?= $m['id']; ?>">Detail</a> 
       </td>
   </tr>
   <?php endforeach; ?>
    </table>

    </div>
    <script src="js/script.js"></script>
</body>
</html>