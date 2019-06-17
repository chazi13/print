<?php
include_once "../../sistem/koneksi.php";

$id_produk = $_GET['id'];

$query1 = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id_produk'");

if ($query1) {
    $_SESSION['pesan'] = [
        'status' => 'success',
        'isi' => 'Produk berhasil hapus'
    ];
} else {
    $_SESSION['pesan'] = [
        'status' => 'danger',
        'isi' => 'Produk gagal hapus'
    ];
}
header('location: ../index.php?page=produk');
