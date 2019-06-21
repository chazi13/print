<?php
include_once '../../sistem/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$status = $_GET['status'];

$query = mysqli_query($koneksi, "UPDATE transaksi SET `status` = '$status' WHERE id_transaksi = '$id_transaksi'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Status Pesanan diupdate'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Status Pesanan gagal diupdate'
    ];
}
header('location: ../index.php?page=pesanan');

