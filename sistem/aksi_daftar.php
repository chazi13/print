<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "INSERT INTO user (`nama`, `email`, `telp`, `password`) VALUE ('$nama', '$email', '$telp', '$password')");

if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pendaftaran berhasil! <br>Silahkan Login'
    ];
    header('location: ../login.php');
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Pendaftaran Gagal! <br>Silahkan coba lagi'
    ];
    header('location: ../daftar.php');
}
