<?php
require 'functions.php';
//ambil id url
$id = $_GET['id'];
if (hapus($id) > 0) {
    echo "<script>
    alert('data berhasil di HAPUS!!!');
    document.location.href = 'index.php';
    </script>";
}else{
 echo "data gagal di tambahkan!!!";
}
?>