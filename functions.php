<?php
function koneksi()
{
  return  mysqli_connect('localhost', 'root','', 'latihanphp');  
}
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  //jika hasilnya 1

  if (mysqli_num_rows($result) == 1){
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;

}
return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $nama = htmlspecialchars($data['NAMA']);
    $npm = $data['NPM'];
    $email = $data['EMAIL'];
    $jurusan = $data['JURUSAN'];
    $gambar = $data['GAMBAR'];
    $query = "INSERT INTO
                mahasiswa
                VALUES
                (null, '$nama','$npm','$email','$jurusan','$gambar');
                ";


    mysqli_query($conn, $query);   
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}
?>
