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
    $_SESSION['level'] = $row['admin'];
    $_SESSION['login'] = true;

    header('location: ../index.php');
} else {
    $_SESSION['pesan'] = 'Login gagal! <br>Username atau password salah';
    header('location: ../login.php');
}
