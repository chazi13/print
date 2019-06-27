<?php
include_once "../../sistem/koneksi.php";

$id_user = $_GET['id'];

$query1 = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");
$query2 = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_user = '$id_user'");
$query2 = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id_user = '$id_user'");

if ($query1 && $query2) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'User berhasil dihapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'User gagal hapus'
    ];
}
header('location: ../index.php?page=user');
