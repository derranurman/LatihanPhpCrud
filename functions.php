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

function hapus($id) {
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $nama = htmlspecialchars($data['NAMA']);
    $npm = $data['NPM'];
    $email = $data['EMAIL'];
    $jurusan = $data['JURUSAN'];
    $gambar = $data['GAMBAR'];
    $query = "UPDATE mahasiswa SET
                NAMA = '$nama',
                NPM = '$npm',
                EMAIL = '$email',
                JURUSAN = '$jurusan',
                GAMBAR = '$gambar'
                WHERE id = $id";


    mysqli_query($conn, $query);   
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $conn = koneksi();
    $query = "SELECT * FROM mahasiswa
                WHERE 
                NAMA LIKE '%$keyword%' OR 
                NPM LIKE '%$keyword%'
                ";

    $result = mysqli_query($conn, $query);          
              $rows = [];
                 while ($row = mysqli_fetch_assoc($result)) {
                     $rows[] = $row;
}
    return $rows;
}
?>
