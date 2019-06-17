<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['level'] = 'user';
    $_SESSION['login'] = true;

    header('location: ../index.php');
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Login gagal! <br>email atau password salah'
    ];
    header('location: ../login.php');
}
