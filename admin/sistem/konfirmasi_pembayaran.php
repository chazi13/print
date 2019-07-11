<?php 
include_once '../../sistem/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "UPDATE konfirmasi_pembayaran SET status = 1 WHERE id_transaksi = '$id_transaksi'");
if ($query) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pembayaran dikondirmasi'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Pembayaran gagal dikondirmasi'
    ];
}

header('location: ../index.php?page=pesanan');
