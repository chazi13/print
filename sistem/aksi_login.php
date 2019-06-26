<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    $check_keranjang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS jml_keranjang FROM keranjang WHERE id_user = '$row[id_user]'"));
    
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['foto'] = $row['foto'];
    $_SESSION['level'] = 'user';
    $_SESSION['login'] = true;
    $_SESSION['jml_keranjang'] = $check_keranjang['jml_keranjang'];
    
    header('location: ../index.php');
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Login gagal! <br>email atau password salah'
    ];
    header('location: ../login.php');
}
