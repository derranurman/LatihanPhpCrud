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
function upload() {
    $nama_file = $_FILES['GAMBAR']['name'];
    $tipe_file = $_FILES['GAMBAR']['type'];
    $ukuran_file = $_FILES['GAMBAR']['size'];
    $error = $_FILES['GAMBAR']['error'];
    $tmp_file = $_FILES['GAMBAR']['tmp_name'];
    //ketika ga ada gambar
    if ($error == 4) {
          return '10.jpg';
    }
    //cek ektensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file); 
    $ekstensi_file = strtolower(end($ekstensi_file));
    if(!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
        alert('yg anda pilih bukan gambar!');
          </script>";
          return false;
    }
    //cek ukuran file
    if ($ukuran_file > 5000000) {
        echo "<script>
        alert('ukuran file terlalu besar!');
          </script>";
          return false;
    }
    //generate nama file gambar
    $nama_file_baru =uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'img/'. $nama_file_baru);
    return $nama_file_baru;
}

function tambah($data)
{
    $conn = koneksi();
    $nama = htmlspecialchars($data['NAMA']);
    $npm = $data['NPM'];
    $email = $data['EMAIL'];
    $jurusan = $data['JURUSAN'];
    // $gambar = $data['GAMBAR'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
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

function login($data) 
{
    $conn = koneksi();
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
//cek username
    if ($user =query("SELECT * FROM user WHERE username = '$username'")) {
        //cek password
        if(password_verify($password, $user['password']))
        //set session
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    }
        return [
            'error' =>true,
            'pesan' => 'USERNAME DAN PASSWORD SALAH!!!'
        ];
    
}

function registrasi($data)
 {
    $conn = koneksi();
    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    
    if(empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
        alert('username / password tidak boleh kosong!');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
    }
    //jika username sudah ada
    if (query("SELECT * FROM user WHERE username = '$username'")){
        echo "<script>
        alert('username sudah ada !!!');
        document.location.href = 'registrasi.php';
        </script>";
        return false;
        }
        //jika pass tidak sesuai
        if($password1 !== $password2) {
            echo "<script>
            alert('pass tidak sesuai !!!');
            document.location.href = 'registrasi.php';
            </script>";
            return false;
        }
        //jika sudah sesuai tinngal eksripsi
        $password_baru = password_hash($password1, PASSWORD_DEFAULT);
        //insert ke table user
        $query = "INSERT INTO user
        VALUES
        (null, '$username', '$password_baru')
        ";
        mysqli_query($conn, $query);
       return mysqli_affected_rows($conn);
}
?>
