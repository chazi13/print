<?php
include_once 'koneksi.php';

$tgl = date('Y-m-d H:i:s');
$pesan = $_POST['pesan'];
$status = 0;
$id_user = $_SESSION['id'];

$query = mysqli_query($koneksi, "INSERT INTO testimoni (tgl, pesan, status, id_user) VALUES ('$tgl', '$pesan', '$status', '$id_user')");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Terima Kasih!'
    ];
}

header('location: ../index.php?page=profil');
