<?php
include_once 'koneksi.php';

$id_transaksi = $_GET['id_transaksi'];

$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
$query1 = mysqli_query($koneksi, "DELETE FROM detail_transaksi WHERE id_transaksi = '$id_transaksi'");
if ($query && $query1) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Transaksi Dibatalkan'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Transaksi Gagal Dibatalkan'
    ];
}
header('location: ../index.php?page=riwayat');

