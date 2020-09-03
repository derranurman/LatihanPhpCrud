<?php
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>
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