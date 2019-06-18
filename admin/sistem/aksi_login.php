<?php
include '../../sistem/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' ");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    
    $_SESSION['id'] = $row['id_admin'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['level'] = 'admin';
    $_SESSION['login'] = true;

    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Selamat Datang ' . $row['nama']
    ];
    header('location: ../index.php');
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Login gagal! <br>Username atau password salah'
    ];
    header('location: ../login.php');
}
